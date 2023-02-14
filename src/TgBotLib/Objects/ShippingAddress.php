<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ShippingAddress implements ObjectTypeInterface
    {
        /**
         * @var string|null
         */
        private $country_code;

        /**
         * @var string|null
         */
        private $state;

        /**
         * @var string|null
         */
        private $city;

        /**
         * @var string|null
         */
        private $street_line1;

        /**
         * @var string|null
         */
        private $street_line2;

        /**
         * @var string|null
         */
        private $post_code;

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
         * Returns an array representation of the object.
         *
         * @return array
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
         * Constructs object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
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