<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SetMyDefaultAdministratorRights extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): bool
        {
            if(isset($parameters['rights']) && $parameters['rights'] instanceof ObjectTypeInterface)
            {
                $parameters['rights'] = json_encode($parameters['rights']->toArray());
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_MY_DEFAULT_ADMINISTRATOR_RIGHTS->value, $parameters));
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
                'rights',
                'for_channels'
            ];
        }
    }