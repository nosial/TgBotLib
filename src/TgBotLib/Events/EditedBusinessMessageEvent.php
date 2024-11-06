<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Message;

    abstract class EditedBusinessMessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::EDITED_BUSINESS_MESSAGE;
        }

        /**
         * New incoming edited business message
         *
         * @return Message
         */
        protected function getEditedBusinessMessage(): Message
        {
            return $this->update->getEditedBusinessMessage();
        }
    }