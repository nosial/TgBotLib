<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class RestrictChatMember extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if($parameters['permissions'] instanceof ObjectTypeInterface)
            {
                $parameters['permissions'] = json_encode($parameters['permissions']->toArray());
            }
            else
            {
                $parameters['permissions'] = json_encode($parameters['permissions']);
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::RESTRICT_CHAT_MEMBER->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'user_id',
                'permissions'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'use_independent_chat_permissions',
                'until_date'
            ];
        }
    }