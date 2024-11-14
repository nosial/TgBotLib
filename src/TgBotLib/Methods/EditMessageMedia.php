<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;

    class EditMessageMedia extends Method
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

            // Handle different media input types
            if (isset($parameters['media']))
            {
                $media = $parameters['media'];

                // If media is a file path and exists locally
                if (is_string($media) && file_exists($media) && is_file($media))
                {
                    $curl = self::buildUpload($bot, Methods::EDIT_MESSAGE_MEDIA->value, 'media', $media, array_diff_key($parameters, ['media' => null]));
                    return Message::fromArray(self::executeCurl($curl));
                }
            }

            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::EDIT_MESSAGE_MEDIA->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'media'
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
                'reply_markup'
            ];
        }
    }