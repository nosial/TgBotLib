<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendSticker extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): Message
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

            if(isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            if (isset($parameters['sticker']))
            {
                $sticker = $parameters['sticker'];

                // If media is a file path and exists locally
                if (is_string($sticker) && file_exists($sticker) && is_file($sticker))
                {
                    $curl = self::buildUpload($bot, Methods::SEND_STICKER->value, 'sticker', $sticker, array_diff_key($parameters, ['sticker' => null]));
                    return Message::fromArray(self::executeCurl($curl));
                }
            }

            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_STICKER->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'sticker'
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
                'allow_paid_broadcast',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }