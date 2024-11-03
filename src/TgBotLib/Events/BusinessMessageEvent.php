<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Message;

    abstract class BusinessMessageEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::BUSINESS_MESSAGE;
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