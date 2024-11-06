<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\ChatInviteLink;

    class CreateChatSubscriptionInviteLink extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): ChatInviteLink
        {
            return ChatInviteLink::fromArray(
                self::executeCurl(self::buildPost($bot, Methods::CREATE_CHAT_SUBSCRIPTION_INVITE_LINK->value, $parameters))
            );
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'subscription_period',
                'subscription_price'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'name'
            ];
        }
    }