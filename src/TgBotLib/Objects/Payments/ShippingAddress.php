<?php


    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ShippingAddress implements ObjectTypeInterface
    {
        private ?string $country_code;
        private ?string $state;
        private ?string $city;
        private ?string $street_line1;
        private ?string $street_line2;
        private ?string $post_code;

        /**
         * Two-letter ISO 3166-1 alpha-2 country code
         *
         * @return string|null
         */
        public function getCountryCode(): ?string
        {
            return $this->country_code;
        }

        /**
         * State, if applicable
         *
         * @return string|null
         */
        public function getState(): ?string
        {
            return $this->state;
        }

        /**
         * City
         *
         * @return string|null
         */
        public function getCity(): ?string
        {
            return $this->city;
        }

        /**
         * First line for the address
         *
         * @return string|null
         */
        public function getStreetLine1(): ?string
        {
            return $this->street_line1;
        }

        /**
         * Second line for the address
         *
         * @return string|null
         */
        public function getStreetLine2(): ?string
        {
            return $this->street_line2;
        }

        /**
         * Address post code
         *
         * @return string|null
         */
        public function getPostCode(): ?string
        {
            return $this->post_code;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'country_code' => $this->country_code,
                'state' => $this->state,
                'city' => $this->city,
                'street_line1' => $this->street_line1,
                'street_line2' => $this->street_line2,
                'post_code' => $this->post_code,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ShippingAddress
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->country_code = $data['country_code'] ?? null;
            $object->state = $data['state'] ?? null;
            $object->city = $data['city'] ?? null;
            $object->street_line1 = $data['street_line1'] ?? null;
            $object->street_line2 = $data['street_line2'] ?? null;
            $object->post_code = $data['post_code'] ?? null;

            return $object;
        }
    }