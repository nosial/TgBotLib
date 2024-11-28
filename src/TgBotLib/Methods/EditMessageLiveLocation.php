<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;

    class EditMessageLiveLocation extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): Message|true
        {
            if (isset($parameters['reply_markup']))
            {
                if ($parameters['reply_markup'] instanceof ObjectTypeInterface)
                {
                    $parameters['reply_markup'] = json_encode($parameters['reply_markup']->toArray());
                }
                elseif (is_array($parameters['reply_markup']))
                {
                    $parameters['reply_markup'] = json_encode($parameters['reply_markup']);
                }
            }

            $result = self::executeCurl(self::buildPost($bot, Methods::EDIT_MESSAGE_LIVE_LOCATION->value, $parameters));

            if(is_bool($result))
            {
                return (bool)$result;
            }

            return Message::fromArray($result);
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'latitude',
                'longitude',
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'business_connection_id',
                'chat_id',
                'message_id',
                'inline_message_id',
                'live_period',
                'horizontal_accuracy',
                'heading',
                'proximity_alert_radius',
                'reply_markup'
            ];
        }
    }