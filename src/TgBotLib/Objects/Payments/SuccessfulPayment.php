<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SuccessfulPayment implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $currency;

        /**
         * @var string
         */
        private $total_amount;

        /**
         * @var string
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
         * @var string
         */
        private $telegram_payment_charge_id;

        /**
         * @var string
         */
        private $provider_payment_charge_id;

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
         * @return string
         */
        public function getTotalAmount(): string
        {
            return $this->total_amount;
        }

        /**
         * Bot specified invoice payload
         *
         * @return string
         */
        public function getInvoicePayload(): string
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
         * Telegram payment identifier
         *
         * @return string
         */
        public function getTelegramPaymentChargeId(): string
        {
            return $this->telegram_payment_charge_id;
        }

        /**
         * Provider payment identifier
         *
         * @return string
         */
        public function getProviderPaymentChargeId(): string
        {
            return $this->provider_payment_charge_id;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'currency' => $this->currency,
                'total_amount' => $this->total_amount,
                'invoice_payload' => $this->invoice_payload,
                'shipping_option_id' => $this->shipping_option_id,
                'order_info' => ($this->order_info instanceof ObjectTypeInterface) ? $this->order_info->toArray() : null,
                'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
                'provider_payment_charge_id' => $this->provider_payment_charge_id,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return SuccessfulPayment
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->currency = $data['currency'] ?? null;
            $object->total_amount = $data['total_amount'] ?? null;
            $object->invoice_payload = $data['invoice_payload'] ?? null;
            $object->shipping_option_id = $data['shipping_option_id'] ?? null;
            $object->order_info = isset($data['order_info']) ? OrderInfo::fromArray($data['order_info']) : null;
            $object->telegram_payment_charge_id = $data['telegram_payment_charge_id'] ?? null;
            $object->provider_payment_charge_id = $data['provider_payment_charge_id'] ?? null;

            return $object;
        }
    }