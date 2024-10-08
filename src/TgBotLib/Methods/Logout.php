<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;

    class Logout extends Method
    {

        /**
         * Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out
         * the bot before running it locally, otherwise there is no guarantee that the bot will receive updates.
         * After a successful call, you can immediately log in on a local server, but will not be able to log in back
         * to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return bool
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters=[]): bool
        {
            return (bool) self::executeCurl(self::buildPost($bot, Methods::LOGOUT->value));
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