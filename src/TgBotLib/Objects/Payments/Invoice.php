<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Invoice implements ObjectTypeInterface
    {
        private string $title;
        private string $description;
        private string $start_parameter;
        private string $currency;
        private int $total_amount;

        /**
         * Product name
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Product description
         *
         * @return string
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * Unique bot deep-linking parameter that can be used to generate this invoice
         *
         * @return string
         */
        public function getStartParameter(): string
        {
            return $this->start_parameter;
        }

        /**
         * Three-letter ISO 4217 currency code
         *
         * @see https://core.telegram.org/bots/payments#supported-currencies
         * @return string
         */
        public function getCurrency(): string
        {
            return $this->currency;
        }

        /**
         * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of
         * US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the
         * decimal point for each currency (2 for the majority of currencies).
         *
         * @see https://core.telegram.org/bots/payments/currencies.json
         * @return int
         */
        public function getTotalAmount(): int
        {
            return $this->total_amount;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'title' => $this->title,
                'description' => $this->description,
                'start_parameter' => $this->start_parameter,
                'currency' => $this->currency,
                'total_amount' => $this->total_amount,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Invoice
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->title = $data['title'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->start_parameter = $data['start_parameter'] ?? null;
            $object->currency = $data['currency'] ?? null;
            $object->total_amount = $data['total_amount'] ?? null;

            return $object;
        }
    }