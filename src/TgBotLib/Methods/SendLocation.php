<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendLocation extends Method
    {
        /**
         * Use this method to send point on the map.
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
            foreach (['latitude', 'longitude'] as $param) {
                if (!isset($parameters[$param]) || !is_numeric($parameters[$param])) {
                    throw new TelegramException("Parameter '$param' must be a numeric value");
                }
            }

            // Validate optional float parameter
            if (isset($parameters['horizontal_accuracy'])) {
                if (!is_numeric($parameters['horizontal_accuracy'])) {
                    throw new TelegramException("Parameter 'horizontal_accuracy' must be a numeric value");
                }
                if ($parameters['horizontal_accuracy'] < 0 || $parameters['horizontal_accuracy'] > 1500) {
                    throw new TelegramException("Parameter 'horizontal_accuracy' must be between 0 and 1500");
                }
            }

            // Validate live_period
            if (isset($parameters['live_period'])) {
                if (!is_int($parameters['live_period'])) {
                    throw new TelegramException("Parameter 'live_period' must be an integer");
                }
                if ($parameters['live_period'] != 0x7FFFFFFF &&
                    ($parameters['live_period'] < 60 || $parameters['live_period'] > 86400)) {
                    throw new TelegramException("Parameter 'live_period' must be between 60 and 86400, or 0x7FFFFFFF");
                }
            }

            // Validate heading
            if (isset($parameters['heading'])) {
                if (!is_int($parameters['heading'])) {
                    throw new TelegramException("Parameter 'heading' must be an integer");
                }
                if ($parameters['heading'] < 1 || $parameters['heading'] > 360) {
                    throw new TelegramException("Parameter 'heading' must be between 1 and 360");
                }
            }

            // Validate proximity_alert_radius
            if (isset($parameters['proximity_alert_radius'])) {
                if (!is_int($parameters['proximity_alert_radius'])) {
                    throw new TelegramException("Parameter 'proximity_alert_radius' must be an integer");
                }
                if ($parameters['proximity_alert_radius'] < 1 || $parameters['proximity_alert_radius'] > 100000) {
                    throw new TelegramException("Parameter 'proximity_alert_radius' must be between 1 and 100000");
                }
            }

            // Handle ReplyParameters
            if (isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters) {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            // Handle reply_markup
            if (isset($parameters['reply_markup'])) {
                if ($parameters['reply_markup'] instanceof ObjectTypeInterface) {
                    $parameters['reply_markup'] = json_encode($parameters['reply_markup']->toArray());
                }
            }

            return Message::fromArray(
                self::executeCurl(
                    self::buildPost($bot, Methods::SEND_LOCATION->value, $parameters)
                )
            );
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'latitude',
                'longitude'
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
                'horizontal_accuracy',
                'live_period',
                'heading',
                'proximity_alert_radius',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }