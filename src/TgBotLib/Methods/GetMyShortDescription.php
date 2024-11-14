<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\BotShortDescription;

    class GetMyShortDescription extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): BotShortDescription
        {
            return BotShortDescription::fromArray(self::executeCurl(self::buildPost($bot, Methods::GET_MY_SHORT_DESCRIPTION->value, $parameters)));
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
            return [
                'language_code'
            ];
        }
    }