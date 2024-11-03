<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Message;

    abstract class MessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::MESSAGE;
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