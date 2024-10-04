<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatLocation implements ObjectTypeInterface
    {
        private Location $location;
        private string $address;

        /**
         * The location to which the supergroup is connected. Can't be a live location.
         *
         * @return Location
         */
        public function getLocation(): Location
        {
            return $this->location;
        }

        /**
         * Location address; 1-64 characters, as defined by the chat owner
         *
         * @return string
         */
        public function getAddress(): string
        {
            return $this->address;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'location' => $this->location?->toArray(),
                'address' => $this->address,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ChatLocation
        {
            $object = new self();
            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;
            $object->address = $data['address'] ?? null;

            return $object;
        }
    }