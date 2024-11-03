<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Message;

    abstract class EditedMessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::EDITED_MESSAGE;
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