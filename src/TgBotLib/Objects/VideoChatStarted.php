<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatStarted implements ObjectTypeInterface
    {
        // Note: This object represents a service message about a video chat started in the chat.
        // Currently, holds no information.

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?VideoChatStarted
        {
            if($data === null)
            {
                return null;
            }

            return new self();
        }
    }