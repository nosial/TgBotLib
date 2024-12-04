<?php

    namespace TgBotLib;

    use PsyncLib\Psync;

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

        /**
         * Retrieves the list of allowed updates.
         *
         * @return array Returns an array containing the allowed updates.
         */
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
         * Polls for updates and processes them. Installs a signal handler if
         * needed, fetches updates, tracks the highest update ID, updates the
         * polling offset, and handles the updates using the Psync mechanism.
         *
         * @return void This method does not return any value.
         */
        public function poll(): void
        {
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
            }

            // Update the offset based on the highest update ID we've seen
            if ($maxUpdateId !== null)
            {
                $this->offset = $maxUpdateId + 1;
            }

            // Pass the method name as a string and the object
            Psync::do([$this, 'handleUpdates'], [$updates]);
            Psync::clean();
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