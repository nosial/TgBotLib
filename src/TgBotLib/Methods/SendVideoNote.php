<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendVideoNote extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
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

            // Handle file uploads
            $hasLocalVideo = isset($parameters['video_note']) && is_string($parameters['video_note']) && file_exists($parameters['video_note']) && is_file($parameters['video_note']);
            $hasLocalThumb = isset($parameters['thumbnail']) && is_string($parameters['thumbnail']) && file_exists($parameters['thumbnail']) && is_file($parameters['thumbnail']);

            if ($hasLocalVideo || $hasLocalThumb)
            {
                $files = [];

                if ($hasLocalVideo)
                {
                    $files['video_note'] = $parameters['video_note'];
                    unset($parameters['video_note']);
                }

                if ($hasLocalThumb)
                {
                    $files['thumbnail'] = $parameters['thumbnail'];
                    unset($parameters['thumbnail']);
                }

                if (count($files) > 1)
                {
                    // Multiple files to upload
                    $curl = self::buildMultiUpload($bot, Methods::SEND_VIDEO_NOTE->value, $files, $parameters);
                }
                else
                {
                    // Single file to upload
                    $fileParam = array_key_first($files);
                    $curl = self::buildUpload($bot, Methods::SEND_VIDEO_NOTE->value, $fileParam, $files[$fileParam], $parameters);
                }

                return Message::fromArray(self::executeCurl($curl));
            }

            // If no local files to upload, use regular POST method
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_VIDEO->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'video_note'
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
                'length',
                'thumbnail',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }