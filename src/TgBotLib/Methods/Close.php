<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;

    class Close extends Method
    {
        /**
         * Use this method to close the bot instance before moving it from one local server to another.
         * You need to delete the webhook before calling this method to ensure that the bot isn't launched again
         * after server restart. The method will return error 429 in the first 10 minutes after the bot is launched.
         * Returns True on success. Requires no parameters.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return bool
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): bool
        {
            return (bool) self::executeCurl(self::buildPost($bot, Methods::CLOSE->value));
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