<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendMediaGroup extends Method
    {
        /**
         * Use this method to send a group of photos, videos, documents or audios as an album.
         * Documents and audio files can be only grouped in an album with messages of the same type.
         * On success, an array of Messages that were sent is returned.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message[]
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            if (!isset($parameters['media']) || !is_array($parameters['media']))
            {
                throw new TelegramException('Media parameter must be an array');
            }

            $mediaCount = count($parameters['media']);
            if ($mediaCount < 2 || $mediaCount > 10)
            {
                throw new TelegramException('Media array must include 2-10 items');
            }

            $hasLocalFiles = false;
            $attachments = [];
            $processedMedia = [];

            foreach ($parameters['media'] as $index => $mediaItem)
            {
                if (!($mediaItem instanceof InputMedia))
                {
                    throw new TelegramException('Invalid media item type');
                }

                $mediaArray = $mediaItem->toArray();

                // Check for local files in the media
                if (isset($mediaArray['media']) && is_string($mediaArray['media']) && file_exists($mediaArray['media']) && is_file($mediaArray['media']))
                {
                    $hasLocalFiles = true;
                    $attachmentKey = "file{$index}";
                    $attachments[$attachmentKey] = $mediaArray['media'];
                    $mediaArray['media'] = "attach://{$attachmentKey}";
                }

                // Check for local thumbnail
                if (isset($mediaArray['thumbnail']) && is_string($mediaArray['thumbnail']) && file_exists($mediaArray['thumbnail']) && is_file($mediaArray['thumbnail']))
                {
                    $hasLocalFiles = true;
                    $thumbKey = "thumb{$index}";
                    $attachments[$thumbKey] = $mediaArray['thumbnail'];
                    $mediaArray['thumbnail'] = "attach://{$thumbKey}";
                }

                $processedMedia[] = $mediaArray;
            }

            // Update parameters with processed media
            $parameters['media'] = json_encode($processedMedia);

            // Handle reply parameters
            if (isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            $curl = $hasLocalFiles
                ? self::buildMultiUpload($bot, Methods::SEND_MEDIA_GROUP->value, $attachments, $parameters)
                : self::buildPost($bot, Methods::SEND_MEDIA_GROUP->value, $parameters);

            $result = self::executeCurl($curl);

            return array_map(function ($messageData) {return Message::fromArray($messageData);}, $result);
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
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
                'message_thread_id',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters'
            ];
        }
    }