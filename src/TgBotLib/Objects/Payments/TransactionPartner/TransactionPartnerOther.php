<?php

    namespace TgBotLib\Objects\Payments\TransactionPartner;

    use TgBotLib\Enums\Types\TransactionPartnerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\TransactionPartner;

    class TransactionPartnerOther extends TransactionPartner implements ObjectTypeInterface
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
        public static function fromArray(?array $data): ?TransactionPartnerOther
        {
            if ($data === null)
            {
                return null;
            }

            $instance = new self();
            $instance->type = TransactionPartnerType::OTHER;

            return $instance;
        }
    }