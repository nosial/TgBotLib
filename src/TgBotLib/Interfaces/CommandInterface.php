<?php

    namespace TgBotLib\Interfaces;

    use TgBotLib\Bot;
    use TgBotLib\Objects\Telegram\Update;

    interface CommandInterface
    {
        /**
         * Execute the command
         *
         * @param Bot $bot
         * @param Update $update
         * @return void
         */
        public function handle(Bot $bot, Update $update): void;
    }