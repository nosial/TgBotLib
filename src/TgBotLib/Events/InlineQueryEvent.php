<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Inline\InlineQuery;

    abstract class InlineQueryEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::INLINE_QUERY;
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