<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class GeneralForumTopicUnhidden implements ObjectTypeInterface
    {
        // Note: This object represents a service message about General forum topic unhidden in the chat.
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
        public static function fromArray(?array $data): ?GeneralForumTopicUnhidden
        {
            if($data === null)
            {
                return null;
            }

            return new self();
        }
    }