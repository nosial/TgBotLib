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
         * @return ChatBoostUpdated The updated chat boost information.
         */
        protected function getChatBoost(): ChatBoostUpdated
        {
            return $this->update->getChatBoost();
        }
    }