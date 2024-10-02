<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WriteAccessAllowed implements ObjectTypeInterface
    {
        // Note: This object represents a service message about a user allowing a bot added to the attachment menu to
        // write messages. Currently, holds no information.

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [];
        }

        /**
         * Convert object from an array representation
         *
         * @param array $data
         * @return WriteAccessAllowed
         */
        public static function fromArray(array $data): self
        {
            return new self();
        }
    }