<?php

    namespace commands;

    use TgBotLib\BotOld;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\CommandInterface;
    use TgBotLib\Objects\Telegram\Update;

    class StartCommand implements CommandInterface
    {
        /**
         * @param BotOld $bot
         * @param Update $update
         * @return void
         * @throws TelegramException
         */
        public function handle(BotOld $bot, Update $update): void
        {
            // reply to the incoming message
            $bot->sendMessage(
                $update->getMessage()?->getChat()?->getId(), 'Hello, ' . $update->getMessage()?->getFrom()?->getFirstName()
            );
        }
    }