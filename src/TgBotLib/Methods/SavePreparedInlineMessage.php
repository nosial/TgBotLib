<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\PreparedInlineMessage;

    class SavePreparedInlineMessage extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): PreparedInlineMessage
        {
            if(isset($parameters['result']))
            {
                if($parameters['result'] instanceof ObjectTypeInterface)
                {
                    $parameters['result'] = json_encode($parameters['result']->toArray());
                }

                if(is_array($parameters['result']))
                {
                    $parameters['result'] = json_encode($parameters['result']);
                }
            }

            return PreparedInlineMessage::fromArray(self::executeCurl(self::buildPost($bot, Methods::SAVE_PREPARED_INLINE_MESSAGE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id',
                'result'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'allow_user_chats',
                'allow_bot_chats',
                'allow_group_chats',
                'allow_channel_chats'
            ];
        }
    }