<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendDice extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): mixed
        {
            // Handle reply parameters
            if (isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            // Handle reply markup
            if (isset($parameters['reply_markup']) && method_exists($parameters['reply_markup'], 'toArray'))
            {
                $parameters['reply_markup'] = $parameters['reply_markup']->toArray();
            }

            // Make request
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_DICE->value, $parameters)));
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
                'business_connection_id',
                'message_thread_id',
                'emoji',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }