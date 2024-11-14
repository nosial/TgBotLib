<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ChatAdministratorRights;

    class GetMyDefaultAdministratorRights extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): ChatAdministratorRights
        {
            return ChatAdministratorRights::fromArray(self::executeCurl(self::buildPost($bot, Methods::GET_MY_DEFAULT_ADMINISTRATOR_RIGHTS->value, $parameters)));
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
                'for_channels'
            ];
        }
    }