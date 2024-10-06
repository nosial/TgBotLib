<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Methods\Close;
    use TgBotLib\Methods\GetMe;
    use TgBotLib\Methods\Logout;
    use TgBotLib\Methods\SendMessage;

    enum Methods : string
    {
        case GET_ME = 'getMe';
        case LOGOUT = 'logOut';
        case CLOSE = 'close';
        case SEND_MESSAGE = 'sendMessage';

        /**
         * Executes a command on the provided bot with the given parameters.
         *
         * @param Bot $bot The bot instance on which the command will be executed.
         * @param array $parameters Optional parameters for the command.
         * @return ObjectTypeInterface|mixed The result of the command execution, varies based on the command.
         * @throws TelegramException if the command execution fails.
         */
        public function execute(Bot $bot, array $parameters=[]): mixed
        {
            return match($this)
            {
                self::GET_ME => GetMe::execute($bot, $parameters),
                self::LOGOUT => LogOut::execute($bot, $parameters),
                self::CLOSE => Close::execute($bot, $parameters),
                self::SEND_MESSAGE => SendMessage::execute($bot, $parameters),
            };
        }
    }
