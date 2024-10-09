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

    class SendAnimation extends Method
    {
        /**
         * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success,
         * the sent Message is returned. Bots can currently send animation files of up to 50 MB in size,
         * this limit may be changed in the future.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
            // Handle object conversions
            if(isset($parameters['caption_entities']) && $parameters['caption_entities'])
            {
                $entities = [];
                foreach($parameters['caption_entities'] as $entity)
                {
                    if($entity instanceof MessageEntity)
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

            if(isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            if(isset($parameters['reply_markup']) && $parameters['reply_markup'] instanceof ObjectTypeInterface)
            {
                $parameters['reply_markup'] = $parameters['reply_markup']->toArray();
            }

            // Handle different photo input types
            if (isset($parameters['animation']))
            {
                $animation = $parameters['animation'];

                // If photo is a file path and exists locally
                if (is_string($animation) && file_exists($animation) && is_file($animation))
                {
                    return Message::fromArray(self::executeCurl(self::buildUpload($bot, Methods::SEND_ANIMATION->value, 'animation', $animation, array_diff_key($parameters, ['animation' => null]))));
                }
            }

            // If photo is a file_id or URL, use regular POST method
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_ANIMATION->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'animation',
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
                'duration',
                'width',
                'height',
                'thumbnail',
                'caption',
                'parse_mode',
                'caption_entities',
                'show_caption_above_media',
                'has_spoiler',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }