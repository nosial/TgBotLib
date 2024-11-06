<?php

    namespace TgBotLib\Events;

    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Message;

    abstract class EditedMessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::EDITED_MESSAGE;
        }

        /**
         * Retrieves the current edited message.
         *
         * @return Message The edited message.
         */
        protected function getEditedMessage(): Message
        {
            return $this->update->getEditedMessage();
        }
    }