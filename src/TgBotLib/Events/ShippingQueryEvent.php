<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Types\EventType;
    use TgBotLib\Enums\UpdateEventType;
    use TgBotLib\Objects\Payments\ShippingQuery;

    abstract class ShippingQueryEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): UpdateEventType
        {
            return UpdateEventType::SHIPPING_QUERY;
        }

        /**
         * New incoming shipping query. Only for invoices with flexible price
         *
         * @return ShippingQuery
         */
        protected function getShippingQuery(): ShippingQuery
        {
            return $this->update->getShippingQuery();
        }
    }