<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Objects\User;

    class GetMe extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters=[]): User
        {
            return User::fromArray(self::executeCurl(self::buildPost($bot, Methods::GET_ME->value)));
        }
    }