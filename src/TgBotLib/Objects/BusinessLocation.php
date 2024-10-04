<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BusinessLocation implements ObjectTypeInterface
    {
        private string $address;
        private ?Location $location;

        /**
         * Address of the business
         *
         * @return string
         */
        public function getAddress(): string
        {
            return $this->address;
        }

        /**
         * Optional. Location of the business
         *
         * @return Location|null
         */
        public function getLocation(): ?Location
        {
            return $this->location;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'address' => $this->address,
                'location' => $this->location?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BusinessLocation
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->address = $data['address'];
            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;

            return $object;
        }
    }