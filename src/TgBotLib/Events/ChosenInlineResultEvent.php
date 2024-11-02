<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Inline\ChosenInlineResult;

    abstract class ChosenInlineResultEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateeventType::CHOSEN_INLINE_RESULT;
        }

        /**
         * Retrieves the chosen inline result from the current update.
         *
         * @return ChosenInlineResult The chosen inline result associated with the current update.
         */
        protected function getChosenInlineResult(): ChosenInlineResult
        {
            return $this->update->getChosenInlineResult();
        }
    }