<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SetChatMenuButton extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): mixed
        {
            if(isset($parameters['menu_button']) && $parameters['menu_button'] instanceof ObjectTypeInterface)
            {
                $parameters['menu_button'] = json_encode($parameters['menu_button']->toArray());
            }

            return self::executeCurl(self::buildPost($bot, Methods::SET_CHAT_MENU_BUTTON->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return null;
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'chat_id',
                'menu_button'
            ];
        }
    }