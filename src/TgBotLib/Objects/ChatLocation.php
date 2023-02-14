<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatLocation implements ObjectTypeInterface
    {
        /**
         * @var Location
         */
        private $location;

        /**
         * @var string
         */
        private $address;

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'location' => ($this->location instanceof Location) ? $this->location->toArray() : $this->location,
                'address' => $this->address,
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

            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;
            $object->address = isset($data['address']) ? $data['address'] : null;

            return $object;
        }
    }