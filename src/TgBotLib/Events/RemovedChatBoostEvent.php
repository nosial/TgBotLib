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
         * Retrieves the removed chat boost from the update.
         *
         * @return ChatBoostRemoved The chat boost that was removed.
         */
        protected function getChatBoostRemoved(): ChatBoostRemoved
        {
            return $this->update->getRemovedChatBoost();
        }
    }