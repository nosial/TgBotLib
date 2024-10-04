<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class OrderInfo implements ObjectTypeInterface
    {
        private ?string $name;
        private ?string $phone_number;
        private ?string $email;
        private ?ShippingAddress $shipping_address;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'name' => $this->name,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'shipping_address' => $this->shipping_address?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?OrderInfo
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->name = $data['name'] ?? null;
            $object->phone_number = $data['phone_number'] ?? null;
            $object->email = $data['email'] ?? null;
            $object->shipping_address = isset($data['shipping_address']) ? ShippingAddress::fromArray($data['shipping_address']) : null;

            return $object;
        }
    }