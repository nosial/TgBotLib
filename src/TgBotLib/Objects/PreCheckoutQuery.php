<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PreCheckoutQuery implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $id;

        /**
         * @var User
         */
        private $from;

        /**
         * @var string
         */
        private $currency;

        /**
         * @var int
         */
        private $total_amount;

        /**
         * @var int
         */
        private $invoice_payload;

        /**
         * @var string|null
         */
        private $shipping_option_id;

        /**
         * @var OrderInfo|null
         */
        private $order_info;

        /**
         * Unique query identifier
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * User who sent the query
         *
         * @return User
         */
        public function getFrom(): User
        {
            return $this->from;
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
         * @return int
         */
        public function getTotalAmount(): int
        {
            return $this->total_amount;
        }

        /**
         * Bot specified invoice payload
         *
         * @return int
         */
        public function getInvoicePayload(): int
        {
            return $this->invoice_payload;
        }

        /**
         * Optional. Identifier of the shipping option chosen by the user
         *
         * @return string|null
         */
        public function getShippingOptionId(): ?string
        {
            return $this->shipping_option_id;
        }

        /**
         * Optional. Order information provided by the user
         *
         * @return OrderInfo|null
         */
        public function getOrderInfo(): ?OrderInfo
        {
            return $this->order_info;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'from' => ($this->from instanceof User) ? $this->from->toArray() : null,
                'currency' => $this->currency,
                'total_amount' => $this->total_amount,
                'invoice_payload' => $this->invoice_payload,
                'shipping_option_id' => $this->shipping_option_id,
                'order_info' => ($this->order_info instanceof OrderInfo) ? $this->order_info->toArray() : null
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();
            $object->id = $data['id'];
            $object->from = User::fromArray($data['from']);
            $object->currency = $data['currency'];
            $object->total_amount = $data['total_amount'];
            $object->invoice_payload = $data['invoice_payload'];
            $object->shipping_option_id = $data['shipping_option_id'] ?? null;
            $object->order_info = OrderInfo::fromArray($data['order_info']) ?? null;
            return $object;
        }
    }