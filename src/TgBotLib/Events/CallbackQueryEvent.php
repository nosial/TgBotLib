<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\CallbackQuery;

    abstract class CallbackQueryEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::CALLBACK_QUERY;
        }

        /**
         * New incoming callback query
         *
         * @return CallbackQuery
         */
        protected function getCallbackQuery(): CallbackQuery
        {
            return $this->update->getCallbackQuery();
        }
    }