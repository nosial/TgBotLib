<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\ChatBoostUpdated;

    abstract class ChatBoostEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::CHAT_BOOST_EVENT;
        }

        protected function getChatBoost(): ChatBoostUpdated
        {
            return $this->update->getChatBoost();
        }
    }