<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\Update;

    class GetChatAdministrators extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            return array_map(
                fn($update) => ChatMember::fromArray($update),
                self::executeCurl(self::buildPost($bot, Methods::GET_CHAT_ADMINISTRATORS->value, $parameters))
            );
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return null;
        }
    }