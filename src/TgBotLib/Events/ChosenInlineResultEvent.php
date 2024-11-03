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
         * The result of an inline query that was chosen by a user and sent to their chat partner.
         *
         * @return ChosenInlineResult The chosen inline result associated with the current update.
         */
        protected function getChosenInlineResult(): ChosenInlineResult
        {
            return $this->update->getChosenInlineResult();
        }
    }