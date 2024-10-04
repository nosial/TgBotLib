<?php

    namespace TgBotLib\Objects\Payments\TransactionPartner;

    use TgBotLib\Enums\Types\TransactionPartnerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\TransactionPartner;

    class TransactionPartnerTelegramAds extends TransactionPartner implements ObjectTypeInterface
    {
        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?TransactionPartnerTelegramAds
        {
            if ($data === null)
            {
                return null;
            }

            $instance = new self();
            $instance->type = TransactionPartnerType::TELEGRAM_ADS;

            return $instance;
        }
    }