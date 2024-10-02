<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class GeneralForumTopicUnhidden implements ObjectTypeInterface
    {
        // Note: This object represents a service message about General forum topic unhidden in the chat.
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
         * Constructs object from an array representation
         *
         * @param array $data
         * @return GeneralForumTopicUnhidden
         */
        public static function fromArray(array $data): self
        {
            return new self();
        }
    }