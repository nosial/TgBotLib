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

    class SendDocument extends Method
    {
        /**
         * Use this method to send general files. On success, the sent Message is returned.
         * Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
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

            if(isset($parameters['reply_markup']) && $parameters['reply_markup'] instanceof ObjectTypeInterface)
            {
                $parameters['reply_markup'] = $parameters['reply_markup']->toArray();
            }

            // Handle file uploads
            $hasLocalDocument = isset($parameters['document']) && is_string($parameters['document']) &&
                file_exists($parameters['document']) && is_file($parameters['document']);
            $hasLocalThumb = isset($parameters['thumbnail']) && is_string($parameters['thumbnail']) &&
                file_exists($parameters['thumbnail']) && is_file($parameters['thumbnail']);

            if ($hasLocalDocument || $hasLocalThumb)
            {
                $files = [];

                if ($hasLocalDocument)
                {
                    $files['document'] = $parameters['document'];
                    unset($parameters['document']);
                }

                if ($hasLocalThumb)
                {
                    $files['thumbnail'] = $parameters['thumbnail'];
                    unset($parameters['thumbnail']);
                }

                if (count($files) > 1)
                {
                    // Multiple files to upload
                    $curl = self::buildMultiUpload($bot, Methods::SEND_DOCUMENT->value, $files, $parameters);
                }
                else
                {
                    // Single file to upload
                    $fileParam = array_key_first($files);
                    $curl = self::buildUpload($bot, Methods::SEND_DOCUMENT->value, $fileParam, $files[$fileParam], $parameters);
                }

                return Message::fromArray(self::executeCurl($curl));
            }

            // If no local files to upload, use regular POST method
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_DOCUMENT->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'document'
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
                'thumbnail',
                'caption',
                'parse_mode',
                'caption_entities',
                'disable_content_type_detection',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
}