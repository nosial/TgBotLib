<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopicClosed implements ObjectTypeInterface
    {
        // Note: This object represents a service message about a forum topic closed in the chat.
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
        public static function fromArray(?array $data): ?ForumTopicClosed
        {
            if($data === null)
            {
                return null;
            }

            return new self();
        }
    }