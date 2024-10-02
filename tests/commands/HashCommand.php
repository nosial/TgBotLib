<?php

    namespace commands;

    use TgBotLib\BotOld;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\CommandInterface;
    use TgBotLib\Objects\Update;

    class HashCommand implements CommandInterface
    {
        /**
         * @param BotOld $bot
         * @param Update $update
         * @return void
         * @throws TelegramException
         */
        public function handle(BotOld $bot, Update $update): void
        {
            // Usage: /hash <text>
            $data = str_replace('/hash ', '', $update->getMessage()?->getText());
            $bot->sendMessage(
                $update->getMessage()?->getChat()?->getId(), md5($data)
            );
        }
    }