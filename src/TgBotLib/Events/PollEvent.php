<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Poll;

    abstract class PollEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::POLL;
        }

        /**
         * New poll state. Bots receive only updates about manually stopped polls and polls, which are sent by the bot
         *
         * @return Poll
         */
        protected function getPoll(): Poll
        {
            return $this->update->getPoll();
        }
    }