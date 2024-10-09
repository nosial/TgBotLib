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

    class SendAudio extends Method
    {
        /**
         * Use this method to send audio files, if you want Telegram clients to display them in the music player.
         * Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently
         * send audio files of up to 50 MB in size, this limit may be changed in the future.
         *
         * For sending voice messages, use the SendVoice method instead.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters=[]): Message
        {
            // Handle object conversions
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

            // Handle file uploads
            $hasLocalAudio = isset($parameters['audio']) && is_string($parameters['audio']) && file_exists($parameters['audio']) && is_file($parameters['audio']);
            $hasLocalThumb = isset($parameters['thumbnail']) && is_string($parameters['thumbnail']) && file_exists($parameters['thumbnail']) && is_file($parameters['thumbnail']);

            if ($hasLocalAudio || $hasLocalThumb)
            {
                $files = [];

                if ($hasLocalAudio)
                {
                    $files['audio'] = $parameters['audio'];
                    unset($parameters['audio']);
                }

                if ($hasLocalThumb)
                {
                    $files['thumbnail'] = $parameters['thumbnail'];
                    unset($parameters['thumbnail']);
                }

                if (count($files) > 1)
                {
                    // Multiple files to upload
                    $curl = self::buildMultiUpload($bot, Methods::SEND_AUDIO->value, $files, $parameters);
                }
                else
                {
                    // Single file to upload
                    $fileParam = array_key_first($files);
                    $curl = self::buildUpload($bot, Methods::SEND_AUDIO->value, $fileParam, $files[$fileParam], $parameters);
                }

                return Message::fromArray(self::executeCurl($curl));
            }

            // If no local files to upload, use regular POST method
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_AUDIO->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'audio'
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
                'duration',
                'performer',
                'title',
                'thumbnail',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }