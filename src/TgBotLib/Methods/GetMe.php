<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\User;

    class GetMe extends Method
    {
        /**
         * A simple method for testing your bot's authentication token. Requires no parameters.
         * Returns basic information about the bot in form of a User object.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return User
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters=[]): User
        {
            return User::fromArray(self::executeCurl(self::buildPost($bot, Methods::GET_ME->value)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return null;
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return null;
        }
    }