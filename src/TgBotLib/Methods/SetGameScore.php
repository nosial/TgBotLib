<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class SetGameScore extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_GAME_SCORE->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id',
                'score'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'force',
                'disable_edit_message',
                'chat_id',
                'message_id',
                'inline_message_id'
            ];
        }
    }