<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class Logout extends Method
    {
        public static function execute(Bot $bot, array $parameters=[]): bool
        {
            return (bool) self::executeCurl(self::buildPost($bot, Methods::LOGOUT->value));
        }
    }