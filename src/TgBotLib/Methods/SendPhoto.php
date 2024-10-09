<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\ReplyParameters;

    class SendPhoto extends Method
    {
        /**
         * Use this method to send photos. On success, the sent Message is returned.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters=[]): Message
        {
            if(isset($parameters['parse_mode']) && $parameters['parse_mode'] instanceof ParseMode)
            {
                $parameters['parse_mode'] = $parameters['parse_mode']->value;
            }

            if(isset($parameters['caption_entities']) && is_array($parameters['caption_entities']))
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

            // Handle different photo input types
            if (isset($parameters['photo']))
            {
                $photo = $parameters['photo'];

                // If photo is a file path and exists locally
                if (is_string($photo) && file_exists($photo) && is_file($photo))
                {
                    $curl = self::buildUpload($bot, Methods::SEND_PHOTO->value, 'photo', $photo, array_diff_key($parameters, ['photo' => null]));
                    return Message::fromArray(self::executeCurl($curl));
                }
            }

            // If photo is a file_id or URL, use regular POST method
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_PHOTO->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'photo'
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