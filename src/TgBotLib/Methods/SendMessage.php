<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\LinkPreviewOptions;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\ReplyParameters;

    class SendMessage extends Method
    {
        /**
         * Use this method to send text messages. On success, the sent Message is returned.
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

            if(isset($parameters['entities']) && is_array($parameters['entities']))
            {
                $entities = [];

                foreach($parameters['entities'] as $entity)
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

                $parameters['entities'] = $entities;
            }

            if(isset($parameters['link_preview_options']) && $parameters['link_preview_options'] instanceof LinkPreviewOptions)
            {
                $parameters['link_preview_options'] = $parameters['link_preview_options']->toArray();
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

            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_MESSAGE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'text'
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
                'parse_mode',
                'entities',
                'link_preview_options',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }