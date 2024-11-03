<?php

    namespace TgBotLib\Events;

    use TgBotLib\Abstracts\UpdateEvent;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Objects\Payments\PaidMediaPurchased;

    abstract class PaidMediaPurchasedEvent extends UpdateEvent
    {
        /**
         * @inheritDoc
         */
        public static function getEventType(): EventType
        {
            return EventType::PAID_MEDIA_PURCHASED;
        }

        /**
         * A user purchased paid media with a non-empty payload sent by the bot in a non-channel chat
         *
         * @return PaidMediaPurchased
         */
        protected function getPurchasedPaidMedia(): PaidMediaPurchased
        {
            return $this->update->getPurchasedPaidMedia();
        }
    }