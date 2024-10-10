<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendVenue extends Method
    {
        /**
         * Use this method to send information about a venue.
         * On success, the sent Message is returned.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
            // Validate required float parameters
            foreach (['latitude', 'longitude'] as $param)
            {
                if (!isset($parameters[$param]) || !is_numeric($parameters[$param]))
                {
                    throw new TelegramException("Parameter '$param' must be a numeric value");
                }
            }

            // Validate required string parameters
            foreach (['title', 'address'] as $param)
            {
                if (!isset($parameters[$param]) || !is_string($parameters[$param]) || empty(trim($parameters[$param])))
                {
                    throw new TelegramException("Parameter '$param' must be a non-empty string");
                }
            }

            // Handle ReplyParameters
            if (isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            // Handle reply_markup
            if (isset($parameters['reply_markup']))
            {
                if ($parameters['reply_markup'] instanceof ObjectTypeInterface)
                {
                    $parameters['reply_markup'] = json_encode($parameters['reply_markup']->toArray());
                }
            }

            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_VENUE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'latitude',
                'longitude',
                'title',
                'address'
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
                'foursquare_id',
                'foursquare_type',
                'google_place_id',
                'google_place_type',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }