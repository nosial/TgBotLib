<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Payments\ShippingQuery;

    abstract class ShippingQueryEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::SHIPPING_QUERY;
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