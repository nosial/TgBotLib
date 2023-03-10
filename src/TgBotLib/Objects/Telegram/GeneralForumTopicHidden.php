<?php

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class GeneralForumTopicHidden implements ObjectTypeInterface
    {
        // Note: This object represents a service message about General forum topic hidden in the chat.
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
         * @return GeneralForumTopicHidden
         */
        public static function fromArray(array $data): self
        {
            return new self();
        }
    }