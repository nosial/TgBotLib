<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\MessageEntity;

    class EditMessageText extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
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

            if(isset($parameters['link_preview_options']) && $parameters['link_preview_options'] instanceof ObjectTypeInterface)
            {
                $parameters['link_preview_options'] = $parameters['link_preview_options']->toArray();
            }

            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::EDIT_MESSAGE_TEXT->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
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
                'chat_id',
                'message_id',
                'inline_message_id',
                'parse_mode',
                'entities',
                'link_preview_options',
                'reply_markup'
            ];
        }
    }