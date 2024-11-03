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