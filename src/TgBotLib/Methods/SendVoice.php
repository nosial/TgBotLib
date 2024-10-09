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

    class SendVoice extends Method
    {
        /**
         * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice
         * message. For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in
         * .M4A format (other formats may be sent as Audio or Document). On success, the sent Message is returned.
         * Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
            // Handle object conversions
            if (isset($parameters['caption_entities']) && $parameters['caption_entities'])
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

            // Handle different voice input types
            if (isset($parameters['voice']))
            {
                $voice = $parameters['voice'];

                // If voice is a file path and exists locally
                if (is_string($voice) && file_exists($voice) && is_file($voice))
                {
                    return Message::fromArray(self::executeCurl(self::buildUpload($bot, Methods::SEND_VOICE->value, 'voice', $voice, array_diff_key($parameters, ['voice' => null]))));
                }
            }

            // If voice is a file_id or URL, use regular POST method
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_VOICE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'voice',
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
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }
