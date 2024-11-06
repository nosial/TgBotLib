<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\PollAnswer;

    abstract class PollAnswerEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::POLL_ANSWER;
        }

        /**
         * A user changed their answer in a non-anonymous poll.
         * Bots receive new votes only in polls that were sent by the bot itself.
         *
         * @return PollAnswer The poll answer associated with the current update.
         */
        protected function getPollAnswer(): PollAnswer
        {
            return $this->update->getPollAnswer();
        }
    }