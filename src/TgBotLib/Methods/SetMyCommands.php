<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SetMyCommands extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['commands']))
            {
                $parameters['commands'] = json_encode(array_map(function ($option) {return $option->toArray();}, $parameters['commands']));
            }

            if(isset($parameters['scope']) && $parameters['scope'] instanceof ObjectTypeInterface)
            {
                $parameters['scope'] = $parameters['scope']->toArray();
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_MY_COMMANDS->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'commands'
            ];
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