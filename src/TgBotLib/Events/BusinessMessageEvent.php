<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Message;

    abstract class BusinessMessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::BUSINESS_MESSAGE;
        }

        /**
         * New incoming business message
         *
         * @return Message
         */
        protected function getBusinessMessage(): Message
        {
            return $this->update->getBusinessMessage();
        }
    }