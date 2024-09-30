<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Bot;
    use TgBotLib\Methods\GetMe;

    enum Methods : string
    {
        case GET_ME = 'getMe';

        public function execute(Bot $bot, array $parameters=[]): mixed
        {
            return match($this)
            {
                self::GET_ME => GetMe::execute($bot, $parameters),
            };
        }
    }
