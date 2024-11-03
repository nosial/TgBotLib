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
         * A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates.
         *
         * @return ChatBoostRemoved The chat boost that was removed.
         */
        protected function getChatBoostRemoved(): ChatBoostRemoved
        {
            return $this->update->getRemovedChatBoost();
        }
    }