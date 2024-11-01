<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\ChatBoostRemoved;

    abstract class RemovedChatBoostEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::REMOVED_CHAT_BOOST_EVENT;
        }

        /**
         * @return ChatBoostRemoved The object representing the removed chat boost.
         */
        protected function getChatBoostRemoved(): ChatBoostRemoved
        {
            return $this->update->getRemovedChatBoost();
        }
    }