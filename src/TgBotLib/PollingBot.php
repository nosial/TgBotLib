<?php

    namespace TgBotLib;

    use RuntimeException;
    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Classes\Logger;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Events\CommandEvent;
    use TgBotLib\Objects\Update;
    use Throwable;

    /**
     * PollingBot class that extends Bot for handling updates using polling.
     */
    class PollingBot extends Bot
    {
        private ?int $offset;
        private int $limit;
        private int $timeout;
        private array $allowedUpdates;
        private bool $fork;

        /**
         * Constructor for the class, initializing with a Bot instance.
         *
         * @param string $token
         * @param string $endpoint
         */
        public function __construct(string $token, string $endpoint='https://api.telegram.org')
        {
            parent::__construct($token, $endpoint);
            $this->offset = null;
            $this->limit = 100;
            $this->timeout = 0;
            $this->allowedUpdates = [];
            $this->fork = false;
        }

        /**
         * Sets the offset value.
         *
         * @param int $offset The offset value to be set.
         * @return void
         */
        public function setOffset(int $offset): void
        {
            $this->offset = $offset;
        }

        /**
         * Retrieves the current offset value.
         *
         * @return int The current offset.
         */
        public function getOffset(): int
        {
            return $this->offset;
        }

        /**
         * Sets the limit for the number of items to process.
         *
         * @param int $limit The maximum number of items to be processed.
         * @return void
         */
        public function setLimit(int $limit): void
        {
            $this->limit = $limit;
        }

        /**
         * Retrieves the limit for the current operation.
         *
         * @return int The limit value.
         */
        public function getLimit(): int
        {
            return $this->limit;
        }

        /**
         * Sets the timeout value.
         *
         * @param int $timeout The timeout value to set.
         * @return void
         */
        public function setTimeout(int $timeout): void
        {
            $this->timeout = $timeout;
        }

        /**
         * Retrieves the current timeout setting.
         *
         * @return int The configured timeout value.
         */
        public function getTimeout(): int
        {
            return $this->timeout;
        }

        /**
         * Sets the list of allowed updates.
         *
         * @param array $allowedUpdates The array of update types that should be allowed.
         *
         * @return void
         */
        public function setAllowedUpdates(array $allowedUpdates): void
        {
            $this->allowedUpdates = $allowedUpdates;
        }

        public function getAllowedUpdates(): array
        {
            return $this->allowedUpdates;
        }

        /**
         * Adds a new allowed update type to the list if it does not already exist.
         *
         * @param string $allowedUpdate The type of update to allow.
         * @return void
         */
        public function addAllowedUpdate(string $allowedUpdate): void
        {
            if(in_array($allowedUpdate, $this->allowedUpdates))
            {
                return;
            }

            $this->allowedUpdates[] = $allowedUpdate;
        }

        /**
         * Sets whether updates should be processed in a forked process
         *
         * @param bool $fork
         * @return void
         */
        public function setFork(bool $fork): void
        {
            $this->fork = $fork;
        }

        /**
         * Gets the current fork setting
         *
         * @return bool
         */
        public function getFork(): bool
        {
            return $this->fork;
        }

        /**
         * Handles incoming updates by fetching and processing them with appropriate event handlers.
         *
         * @return void
         */
        public function handleUpdates(): void
        {
            $updates = $this->getUpdates(offset: ($this->offset ?: 0), limit: $this->limit, timeout: $this->timeout, allowed_updates: $this->retrieveAllowedUpdates());

            if (empty($updates))
            {
                return;
            }

            // Update the offset based on the last update ID
            $lastUpdate = end($updates);
            if ($lastUpdate->getUpdateId() > ($this->offset ?? 0))
            {
                $this->offset = $lastUpdate->getUpdateId() + 1;
            }

            if ($this->fork)
            {
                $this->handleUpdatesInFork($updates);
            }
            else
            {
                $this->processUpdates($updates);
            }
        }

        /**
         * Handles updates in a forked child process
         *
         * @param array $updates
         * @return void
         */
        private function handleUpdatesInFork(array $updates): void
        {
            $pid = pcntl_fork();

            if ($pid == -1)
            {
                // Fork failed
                throw new RuntimeException('Failed to fork process for update handling');
            }
            elseif ($pid)
            {
                // Parent process
                // Wait for child to finish to prevent zombie processes
                pcntl_wait($status);
            }
            else
            {
                // Child process
                try
                {
                    $this->processUpdates($updates);
                    exit(0);
                }
                catch (Throwable $e)
                {
                    Logger::getLogger()->error("Error in forked process: " . $e->getMessage());
                    exit(1);
                }
            }
        }

        /**
         * Processes a batch of updates with appropriate event handlers
         *
         * @param array $updates
         * @return void
         */
        private function processUpdates(array $updates): void
        {
            /** @var Update $update */
            foreach ($updates as $update)
            {
                // Check if the update contains a command
                $command = $update?->getAnyMessage()?->getCommand();
                if ($command !== null)
                {
                    $commandHandlers = $this->getEventHandlersByCommand($command);
                    foreach ($commandHandlers as $commandHandler)
                    {
                        /** @var CommandEvent $commandHandler */
                        if ($commandHandler::getCommand() === $command)
                        {
                            (new $commandHandler($update))->handle($this);
                            continue 2;
                        }
                    }
                }

                // Check if the update contains a callback query
                $updateByType = $this->getEventHandlersByType(EventType::determineEventType($update));
                if (count($updateByType) === 0)
                {
                    // If no event handlers are found appropriate for the update type, use the generic update event handler
                    foreach ($this->getEventHandlersByType(EventType::UPDATE_EVENT) as $eventHandler)
                    {
                        /** @var UpdateEvent $eventHandler */
                        (new $eventHandler($update))->handle($this);
                    }
                }
                else
                {
                    // Otherwise, use the appropriate event handler for the update type
                    foreach ($updateByType as $eventHandler)
                    {
                        /** @var UpdateEvent $eventHandler */
                        (new $eventHandler($update))->handle($this);
                    }
                }
            }
        }

        /**
         * Retrieves the allowed updates.
         *
         * @return array|null Returns an array of allowed updates if available, otherwise null.
         */
        private function retrieveAllowedUpdates(): ?array
        {
            if (count($this->allowedUpdates) === 0)
            {
                return null;
            }

            return $this->allowedUpdates;
        }
    }