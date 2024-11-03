<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Inline\InlineQuery;

    abstract class InlineQueryEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::INLINE_QUERY;
        }

        /**C
         * New incoming inline query
         *
         * @return InlineQuery
         */
        protected function getInlineQuery(): InlineQuery
        {
            return $this->update->getInlineQuery();
        }
    }