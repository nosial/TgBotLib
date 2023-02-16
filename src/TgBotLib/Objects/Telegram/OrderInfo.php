<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class OrderInfo implements ObjectTypeInterface
    {
        /**
         * @var string|null
         */
        private $name;

        /**
         * @var string|null
         */
        private $phone_number;

        /**
         * @var string|null
         */
        private $email;

        /**
         * @var ShippingAddress|null
         */
        private $shipping_address;

        /**
         * Optional. User name
         *
         * @return string|null
         */
        public function getName(): ?string
        {
            return $this->name;
        }

        /**
         * Optional. User's phone number
         *
         * @return string|null
         */
        public function getPhoneNumber(): ?string
        {
            return $this->phone_number;
        }

        /**
         * Optional. User email
         *
         * @return string|null
         */
        public function getEmail(): ?string
        {
            return $this->email;
        }

        /**
         * Optional. User shipping address
         *
         * @return ShippingAddress|null
         */
        public function getShippingAddress(): ?ShippingAddress
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
                'name' => $this->name,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'shipping_address' => ($this->shipping_address instanceof ShippingAddress) ? $this->shipping_address->toArray() : null,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return OrderInfo
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->name = $data['name'] ?? null;
            $object->phone_number = $data['phone_number'] ?? null;
            $object->email = $data['email'] ?? null;
            $object->shipping_address = ($data['shipping_address'] ?? null) instanceof ShippingAddress ? $data['shipping_address'] : ShippingAddress::fromArray($data['shipping_address'] ?? []);

            return $object;
        }
    }