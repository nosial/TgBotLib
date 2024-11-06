<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Message;

    abstract class MessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::MESSAGE;
        }

        /**
         * Retrieves the current message.
         *
         * @return Message The message.
         */
        protected function getMessage(): Message
        {
            return $this->update->getMessage();
        }
    }