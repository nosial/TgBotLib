<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\User;

    class ShippingQuery implements ObjectTypeInterface
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
        private $invoice_payload;

        /**
         * @var ShippingAddress
         */
        private $shipping_address;

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'from' => ($this->from instanceof User) ? $this->from->toArray() : $this->from,
                'invoice_payload' => $this->invoice_payload,
                'shipping_address' => ($this->shipping_address instanceof ShippingAddress) ? $this->shipping_address->toArray() : $this->shipping_address,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ShippingQuery
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->id = $data['id'] ?? null;
            $object->from = isset($data['from']) && is_array($data['from']) ? User::fromArray($data['from']) : $data['from'];
            $object->invoice_payload = $data['invoice_payload'] ?? null;
            $object->shipping_address = isset($data['shipping_address']) && is_array($data['shipping_address']) ? ShippingAddress::fromArray($data['shipping_address']) : $data['shipping_address'];

            return $object;
        }
    }