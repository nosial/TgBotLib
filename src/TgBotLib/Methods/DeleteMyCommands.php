<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class DeleteMyCommands extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['scope']) && $parameters['scope'] instanceof ObjectTypeInterface)
            {
                $parameters['scope'] = json_encode($parameters['scope']->toArray());
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::DELETE_MY_COMMANDS->value, $parameters));
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
                'scope',
                'language_code'
            ];
        }
    }