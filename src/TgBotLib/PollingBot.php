<?php

    namespace TgBotLib;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Classes\Utilities;
    use TgBotLib\Enums\EventType;

    /**
     * PollingBot class that extends Bot for handling updates using polling.
     */
    class PollingBot extends Bot
    {
        private ?int $offset;
        private int $limit;
        private int $timeout;
        private array $allowedUpdates;

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
        }

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
         * Handles incoming updates by fetching and processing them with appropriate event handlers.
         *
         * @return void
         */
        public function handleUpdates(): void
        {
            foreach($this->getUpdates(offset: ($this->offset ?: 0), limit: $this->limit, timeout: $this->timeout, allowed_updates: $this->retrieveAllowedUpdates()) as $update)
            {
                // Update the last offset if the current Update ID is greater than the offset ID
                if($update->getUpdateId() > $this->offset)
                {
                    $this->offset = $update->getUpdateId() + 1;
                }

                $updateByType = $this->getEventHandlersByType(EventType::determineEventType($update));

                if(count($updateByType) === 0)
                {
                    // If no event handlers are found appropriate for the update type, use the generic update event handler
                    // So that we don't miss any updates
                    /** @var UpdateEvent $eventHandler */
                    foreach($this->getEventHandlersByType(EventType::UPDATE_EVENT) as $eventHandler)
                    {
                        (new $eventHandler($update))->handle($this);
                    }
                }
                else
                {
                    // Otherwise, use the appropriate event handler for the update type
                    /** @var UpdateEvent $eventHandler */
                    foreach($this->getEventHandlersByType(EventType::determineEventType($update)) as $eventHandler)
                    {
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
            if(count($this->allowedUpdates) === 0)
            {
                return null;
            }

            return $this->allowedUpdates;
        }
    }