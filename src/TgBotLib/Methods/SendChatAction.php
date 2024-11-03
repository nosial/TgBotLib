<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ChatActionType;

    class SendChatAction extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): mixed
        {
            if($parameters['action'] instanceof ChatActionType)
            {
                $parameters['action'] = $parameters['action']->value;
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SEND_CHAT_ACTION->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'action'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'business_connection_id',
                'message_thread_id'
            ];
        }
    }