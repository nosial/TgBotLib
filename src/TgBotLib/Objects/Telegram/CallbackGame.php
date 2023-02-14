<?php

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class CallbackGame implements ObjectTypeInterface
    {
        // Note: A placeholder, currently holds no information. Use BotFather to set up your game.

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [];
        }

        /**
         * Constructs an object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            return new self();
        }
    }