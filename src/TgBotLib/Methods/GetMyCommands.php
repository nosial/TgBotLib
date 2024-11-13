<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommand;
    use TgBotLib\Objects\ChatMember;

    class GetMyCommands extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            if(isset($parameters['scope']) && $parameters['scope'] instanceof ObjectTypeInterface)
            {
                $parameters['scope'] = json_encode($parameters['scope']->toArray());
            }

            return array_map(
                fn($update) => BotCommand::fromArray($update),
                self::executeCurl(self::buildPost($bot, Methods::GET_MY_COMMANDS->value, $parameters))
            );
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