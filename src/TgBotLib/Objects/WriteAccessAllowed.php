<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WriteAccessAllowed implements ObjectTypeInterface
    {
        // Note: This object represents a service message about a user allowing a bot added to the attachment menu to
        // write messages. Currently, holds no information.

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
        public static function fromArray(?array $data): ?WriteAccessAllowed
        {
            if($data === null)
            {
                return null;
            }

            return new self();
        }
    }