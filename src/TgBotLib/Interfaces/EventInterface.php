<?php

    namespace TgBotLib\Interfaces;

    use TgBotLib\BotOld;
    use TgBotLib\Objects\Update;

    interface EventInterface
    {
        /**
         * Execute the command
         *
         * @param BotOld $bot
         * @param Update $update
         * @return void
         */
        public function handle(BotOld $bot, Update $update): void;
    }