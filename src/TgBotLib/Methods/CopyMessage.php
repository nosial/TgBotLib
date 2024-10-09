<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\MessageId;
    use TgBotLib\Objects\ReplyParameters;

    class CopyMessage extends Method
    {
        /**
         * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages,
         * giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the
         * value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage,
         * but the copied message doesn't have a link to the original message.
         *
         * Returns the MessageId of the sent message on success.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return MessageId
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): MessageId
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


            return MessageId::fromArray(self::executeCurl(self::buildPost($bot, Methods::COPY_MESSAGE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'from_chat_id',
                'message_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'message_thread_id',
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