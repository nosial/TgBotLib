<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\BusinessConnection;

    abstract class BusinessConnectionEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::BUSINESS_CONNECTION;
        }

        /**
         * Fetches the BusinessConnection instance associated with this update.
         *
         * @return BusinessConnection The business connection associated with this update.
         */
        protected function getBusinessConnection(): BusinessConnection
        {
            return $this->update->getBusinessConnection();
        }
    }