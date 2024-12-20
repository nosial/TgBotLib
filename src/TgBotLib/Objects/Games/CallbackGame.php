<?php

    namespace TgBotLib\Objects\Games;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class CallbackGame implements ObjectTypeInterface
    {
        // Note: A placeholder, currently holds no information. Use BotFather to set up your game.

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
        public static function fromArray(?array $data): ?CallbackGame
        {
            if($data === null)
            {
                return null;
            }

            return new self();
        }
    }