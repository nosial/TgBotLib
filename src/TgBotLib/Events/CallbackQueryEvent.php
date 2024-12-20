<?php

    namespace TgBotLib\Events;

    use LogicException;
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
         * Retrieves data associated with the callback.
         *
         * @return string
         */
        public abstract static function getCallbackData(): string;

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