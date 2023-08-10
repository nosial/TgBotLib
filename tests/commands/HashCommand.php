<?php

    namespace commands;

    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\CommandInterface;
    use TgBotLib\Objects\Telegram\Update;

    class HashCommand implements CommandInterface
    {
        /**
         * @param Bot $bot
         * @param Update $update
         * @return void
         * @throws TelegramException
         */
        public function handle(Bot $bot, Update $update): void
        {
            // Usage: /hash <text>
            $data = str_replace('/hash ', '', $update->getMessage()?->getText());
            $bot->sendMessage(
                $update->getMessage()?->getChat()?->getId(), md5($data)
            );
        }
    }