<?php

    namespace TgBotLib\Objects\Payments\TransactionPartner;

    use TgBotLib\Enums\Types\TransactionPartnerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Payments\RevenueWithdrawalState;
    use TgBotLib\Objects\Payments\TransactionPartner;

    class TransactionPartnerFragment extends TransactionPartner implements ObjectTypeInterface
    {
        private ?RevenueWithdrawalState $withdrawal_state;

        /**
         * Optional. State of the transaction if the transaction is outgoing
         *
         * @return RevenueWithdrawalState|null
         */
        public function getWithdrawalState(): ?RevenueWithdrawalState
        {
            return $this->withdrawal_state;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
                'withdrawal_state' => $this->withdrawal_state?->toArray(),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?TransactionPartnerFragment
        {
            if ($data === null)
            {
                return null;
            }

            $instance = new self();
            $instance->type = TransactionPartnerType::FRAGMENT;
            $instance->withdrawal_state = isset($data['withdrawal_state']) ? RevenueWithdrawalState::fromArray($data['withdrawal_state']) : null;

            return $instance;
        }

    }