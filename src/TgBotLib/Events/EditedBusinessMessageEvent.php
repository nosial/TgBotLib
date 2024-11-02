<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Message;

    abstract class EditedBusinessMessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::EDITED_BUSINESS_MESSAGE;
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