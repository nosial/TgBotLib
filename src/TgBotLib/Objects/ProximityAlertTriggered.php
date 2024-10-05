<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ProximityAlertTriggered implements ObjectTypeInterface
    {
        private User $traveler;
        private User $watcher;
        private int $distance;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'traveler' => $this->traveler?->toArray(),
                'watcher' => $this->watcher?->toArray(),
                'distance' => $this->distance,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ProximityAlertTriggered
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->traveler = isset($data['traveler'])  ? User::fromArray($data['traveler']) : $data['traveler'];
            $object->watcher = isset($data['watcher']) ? User::fromArray($data['watcher']) : $data['watcher'];
            $object->distance = $data['distance'];

            return $object;
        }
    }