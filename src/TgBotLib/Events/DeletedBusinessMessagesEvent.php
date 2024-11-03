<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\BusinessMessagesDeleted;

    abstract class DeletedBusinessMessagesEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::DELETED_BUSINESS_MESSAGES;
        }

        /**
         * Messages were deleted from a connected business account
         *
         * @return BusinessMessagesDeleted
         */
        protected function getBusinessMessagesDeleted(): BusinessMessagesDeleted
        {
            return $this->update->getDeletedBusinessMessages();
        }
    }