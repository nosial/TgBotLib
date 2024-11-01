<?php

    namespace TgBotLib;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Classes\Utilities;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Update;

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

        public function getOffset(): int
        {
            return $this->offset;
        }

        public function setLimit(int $limit): void
        {
            $this->limit = $limit;
        }

        public function getLimit(): int
        {
            return $this->limit;
        }

        public function setTimeout(int $timeout): void
        {
            $this->timeout = $timeout;
        }

        public function getTimeout(): int
        {
            return $this->timeout;
        }

        public function setAllowedUpdates(array $allowedUpdates): void
        {
            $this->allowedUpdates = $allowedUpdates;
        }

        public function getAllowedUpdates(): array
        {
            return $this->allowedUpdates;
        }

        public function addAllowedUpdate(string $allowedUpdate): void
        {
            if(in_array($allowedUpdate, $this->allowedUpdates))
            {
                return;
            }

            $this->allowedUpdates[] = $allowedUpdate;
        }

        public function handleUpdates(): void
        {
            foreach($this->getUpdates(offset: ($this->offset ?: 0), limit: $this->limit, timeout: $this->timeout, allowed_updates: $this->retrieveAllowedUpdates()) as $update)
            {
                // Update the last offset if the current Update ID is greater than the offset ID
                if($update->getUpdateId() > $this->offset)
                {
                    $this->offset = $update->getUpdateId() + 1;
                }

                $updateByType = $this->getEventHandlersByType(Utilities::determineEventType($update));

                if(count($updateByType) === 0)
                {
                    // If no event handlers are found appropriate for the update type, use the generic update event handler
                    // So that we don't miss any updates
                    /** @var UpdateEvent $eventHandler */
                    foreach($this->getEventHandlersByType(UpdateEventType::UPDATE_EVENT) as $eventHandler)
                    {
                        (new $eventHandler($update))->handle($this);
                    }
                }
                else
                {
                    // Otherwise, use the appropriate event handler for the update type
                    /** @var UpdateEvent $eventHandler */
                    foreach($this->getEventHandlersByType(Utilities::determineEventType($update)) as $eventHandler)
                    {
                        (new $eventHandler($update))->handle($this);
                    }
                }
            }
        }

        private function retrieveAllowedUpdates(): ?array
        {
            if(count($this->allowedUpdates) === 0)
            {
                return null;
            }

            return $this->allowedUpdates;
        }
    }