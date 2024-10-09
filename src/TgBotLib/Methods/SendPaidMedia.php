<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\ReplyParameters;

    class SendPaidMedia extends Method
    {
        /**
         * Use this method to send paid media. On success, the sent Message is returned.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
            // Handle object conversions
            if (isset($parameters['caption_entities']) && is_array($parameters['caption_entities']))
            {
                $entities = [];
                foreach ($parameters['caption_entities'] as $entity)
                {
                    if ($entity instanceof MessageEntity)
                    {
                        $entities[] = $entity->toArray();
                    }
                    else
                    {
                        $entities[] = $entity;
                    }
                }
                $parameters['caption_entities'] = $entities;
            }

            if (isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

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

            // Handle file uploads for media
            $hasLocalMedia = false;
            if (isset($parameters['media']) && is_array($parameters['media']))
            {
                foreach ($parameters['media'] as &$mediaItem)
                {
                    if (isset($mediaItem['media']) && is_string($mediaItem['media']) && file_exists($mediaItem['media']) && is_file($mediaItem['media']))
                    {
                        $hasLocalMedia = true;
                    }
                }
            }

            if ($hasLocalMedia)
            {
                $files = [];

                foreach ($parameters['media'] as $key => &$mediaItem)
                {
                    if (isset($mediaItem['media']) && file_exists($mediaItem['media']))
                    {
                        $files["media_$key"] = $mediaItem['media'];
                        $mediaItem['media'] = "attach://media_$key";
                    }
                }

                // Upload files via multipart/form-data
                $curl = self::buildMultiUpload($bot, Methods::SEND_PAID_MEDIA->value, $files, $parameters);
                return Message::fromArray(self::executeCurl($curl));
            }

            // If no local media files, use regular POST request
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_PAID_MEDIA->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'star_count',
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
                'payload',
                'caption',
                'parse_mode',
                'caption_entities',
                'show_caption_above_media',
                'disable_notification',
                'protect_content',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }
