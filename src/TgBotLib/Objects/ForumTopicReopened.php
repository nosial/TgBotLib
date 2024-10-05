<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopicReopened implements ObjectTypeInterface
    {
        // Note: This object represents a service message about a forum topic reopened in the chat.
        // Currently, holds no information.

        /**
         * Returns array representation of object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ForumTopicReopened
        {
            if($data === null)
            {
                return null;
            }

            return new self();
        }
    }