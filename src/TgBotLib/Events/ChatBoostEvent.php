<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\ChatBoostUpdated;

    abstract class ChatBoostEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::CHAT_BOOST_EVENT;
        }

        /**
         * A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates.
         *
         * @return ChatBoostUpdated The updated chat boost information.
         */
        protected function getChatBoost(): ChatBoostUpdated
        {
            return $this->update->getChatBoost();
        }
    }