<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Payments\PreCheckoutQuery;

    abstract class PreCheckoutQueryEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::PRE_CHECKOUT_QUERY;
        }

        /**
         * New incoming pre-checkout query. Contains full information about checkout
         *
         * @return PreCheckoutQuery
         */
        protected function getPreCheckoutQuery(): PreCheckoutQuery
        {
            return $this->update->getPreCheckoutQuery();
        }
    }