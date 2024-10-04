<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\User;

    class ShippingQuery implements ObjectTypeInterface
    {
        private string $id;
        private User $from;
        private string $invoice_payload;
        private ShippingAddress $shipping_address;

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
         * Bot specified invoice payload
         *
         * @return string
         */
        public function getInvoicePayload(): string
        {
            return $this->invoice_payload;
        }

        /**
         * User specified shipping address
         *
         * @return ShippingAddress
         */
        public function getShippingAddress(): ShippingAddress
        {
            return $this->shipping_address;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'from' => $this->from?->toArray(),
                'invoice_payload' => $this->invoice_payload,
                'shipping_address' => $this->shipping_address?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ShippingQuery
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->id = $data['id'] ?? null;
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->invoice_payload = $data['invoice_payload'] ?? null;
            $object->shipping_address = isset($data['shipping_address']) ? ShippingAddress::fromArray($data['shipping_address']) : null;

            return $object;
        }
    }