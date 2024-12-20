<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Poll;

    abstract class PollEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::POLL;
        }

        /**
         * A user changed their answer in a non-anonymous poll.
         * Bots receive new votes only in polls that were sent by the bot itself.
         *
         * @return Poll The poll.
         */
        protected function getPoll(): Poll
        {
            return $this->update->getPoll();
        }
    }