<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ProximityAlertTriggered implements ObjectTypeInterface
    {
        /**
         * @var User
         */
        private $traveler;

        /**
         * @var User
         */
        private $watcher;

        /**
         * @var int
         */
        private $distance;

        /**
         * User that triggered the alert
         *
         * @return User
         */
        public function getTraveler(): User
        {
            return $this->traveler;
        }

        /**
         * User that set the alert
         *
         * @return User
         */
        public function getWatcher(): User
        {
            return $this->watcher;
        }

        /**
         * The distance between the users
         *
         * @return int
         */
        public function getDistance(): int
        {
            return $this->distance;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'traveler' => ($this->traveler instanceof ObjectTypeInterface) ? $this->traveler->toArray() : $this->traveler,
                'watcher' => ($this->watcher instanceof ObjectTypeInterface) ? $this->watcher->toArray() : $this->watcher,
                'distance' => $this->distance,
            ];
        }

        /**
         * Constructs the object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();
            $object->traveler = User::fromArray($data['traveler']);
            $object->watcher = User::fromArray($data['watcher']);
            $object->distance = $data['distance'];

            return $object;
        }
    }