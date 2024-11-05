<?php

    namespace TgBotLib;

    use RuntimeException;
    use function RuntimeException;

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
        private array $childPids;

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
            $this->childPids = [];

            // Register signal handler for child processes
            if (function_exists('pcntl_signal'))
            {
                pcntl_signal(SIGCHLD, [$this, 'signalHandler']);
            }
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
         * Sets the fork value.
         *
         * @param bool $fork The fork value to set.
         * @return void
         */
        public function setFork(bool $fork): void
        {
            $this->fork = $fork;
        }

        /**
         * Retrieves the current fork setting.
         *
         * @return bool The configured fork value.
         */
        public function getFork(): bool
        {
            return $this->fork;
        }

        private function signalHandler(int $signal): void
        {
            if ($signal === SIGCHLD)
            {
                $i = -1;
                while (($pid = pcntl_wait($i, WNOHANG)) > 0)
                {
                    $key = array_search($pid, $this->childPids);
                    if ($key !== false)
                    {
                        unset($this->childPids[$key]);
                    }
                }
            }
        }

        /**
         * Handles incoming updates by fetching and processing them with appropriate event handlers.
         *
         * @return void
         */
        public function handleUpdates(): void
        {
            // Install signal handler
            if ($this->fork && function_exists('pcntl_signal_dispatch'))
            {
                pcntl_signal_dispatch();
            }

            $updates = $this->getUpdates(offset: ($this->offset ?: 0), limit: $this->limit, timeout: $this->timeout, allowed_updates: $this->retrieveAllowedUpdates());

            if (empty($updates))
            {
                return;
            }

            // Track the highest update ID we've seen
            $maxUpdateId = null;

            foreach ($updates as $update)
            {
                // Update the maximum update ID as we go
                if ($maxUpdateId === null || $update->getUpdateId() > $maxUpdateId)
                {
                    $maxUpdateId = $update->getUpdateId();
                }

                if ($this->fork)
                {
                    // Clean up any finished processes
                    if (function_exists('pcntl_signal_dispatch'))
                    {
                        pcntl_signal_dispatch();
                    }

                    $pid = pcntl_fork();

                    if ($pid == -1)
                    {
                        // Fork failed
                        throw new RuntimeException('Failed to fork process for update handling');
                    }
                    elseif ($pid)
                    {
                        // Parent process
                        $this->childPids[] = $pid;

                        // If we have too many child processes, wait for some to finish
                        $maxChildren = 32; // Adjust this value based on your system's capabilities
                        while (count($this->childPids) >= $maxChildren)
                        {
                            if (function_exists('pcntl_signal_dispatch'))
                            {
                                pcntl_signal_dispatch();
                            }

                            usleep(10000); // Sleep for 10ms to prevent CPU hogging
                        }
                    }
                    else
                    {
                        // Child process
                        try
                        {
                            $this->handleUpdate($update);
                        }
                        finally
                        {
                            exit(0);
                        }
                    }
                }
                else
                {
                    $this->handleUpdate($update);
                }
            }

            // Update the offset based on the highest update ID we've seen
            if ($maxUpdateId !== null)
            {
                $this->offset = $maxUpdateId + 1;
            }

            // If forking is enabled, ensure we clean up any remaining child processes
            if ($this->fork)
            {
                // Wait for remaining child processes to finish
                while (!empty($this->childPids))
                {
                    if (function_exists('pcntl_signal_dispatch'))
                    {
                        pcntl_signal_dispatch();
                    }

                    usleep(10000); // Sleep for 10ms to prevent CPU hogging
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