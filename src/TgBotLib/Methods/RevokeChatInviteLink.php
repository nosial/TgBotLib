<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ChatInviteLink;

    class RevokeChatInviteLink extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): ChatInviteLink
        {
            return ChatInviteLink::fromArray(
                self::executeCurl(self::buildPost($bot, Methods::REVOKE_CHAT_INVITE_LINK->value, $parameters))
            );
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'invite_link'
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