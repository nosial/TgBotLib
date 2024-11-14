<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class DeleteMessages extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if (isset($parameters['message_ids']) && is_array($parameters['message_ids']))
            {
                $parameters['message_ids'] = json_encode($parameters['message_ids']);
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::DELETE_MESSAGES->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'message_ids'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return null;
        }
    }