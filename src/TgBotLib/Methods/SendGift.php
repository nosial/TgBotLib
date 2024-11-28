<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SendGift extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['text_parse_mode']) && $parameters['text_parse_mode'] instanceof ParseMode)
            {
                $parameters['text_parse_mode'] = $parameters['text_parse_mode']->value;
            }

            if(isset($parameters['text_entities']))
            {
                $textEntities = [];
                foreach($parameters['text_entities'] as $textEntity)
                {
                    if($textEntity instanceof ObjectTypeInterface)
                    {
                        $textEntities[] = $textEntity->toArray();
                    }

                    if(is_array($textEntity))
                    {
                        $textEntities[] = $textEntity;
                    }
                }

                $parameters['text_entities'] = json_encode($textEntities);
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SEND_GIFT->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id',
                'gift_id'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'text',
                'text_parse_mode',
                'text_entities'
            ];
        }
    }