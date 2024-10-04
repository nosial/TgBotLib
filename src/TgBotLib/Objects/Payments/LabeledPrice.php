<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class LabeledPrice implements ObjectTypeInterface
    {
        private string $label;
        private int $amount;

        /**
         * Portion label
         *
         * @return string
         */
        public function getLabel(): string
        {
            return $this->label;
        }

        /**
         * Price of the product in the smallest units of the currency (integer, not float/double). For example, for a
         * price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits
         * past the decimal point for each currency (2 for the majority of currencies).
         *
         * @see https://core.telegram.org/bots/payments#supported-currencies
         * @see https://core.telegram.org/bots/payments/currencies.json
         * @return int
         */
        public function getAmount(): int
        {
            return $this->amount;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'label' => $this->label,
                'amount' => $this->amount,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?LabeledPrice
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->label = $data['label'] ?? null;
            $object->amount = $data['amount'] ?? null;

            return $object;
        }
    }