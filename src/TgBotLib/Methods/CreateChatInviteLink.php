<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ChatInviteLink;

    class CreateChatInviteLink extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): ChatInviteLink
        {
            return ChatInviteLink::fromArray($bot->sendRequest(Methods::CREATE_CHAT_INVITE_LINK->value, $parameters));
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
            return [
                'name',
                'expire_date',
                'member_limit',
                'creates_join_request'
            ];
        }
    }