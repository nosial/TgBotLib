<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Location implements ObjectTypeInterface
    {
        private float $longitude;
        private float $latitude;
        private int|null|float $horizontal_accuracy;
        private ?int $live_period;
        private ?int $heading;
        private ?int $proximity_alert_radius;

        /**
         * Longitude as defined by sender
         *
         * @return float
         */
        public function getLongitude(): float
        {
            return $this->longitude;
        }

        /**
         * Latitude as defined by sender
         *
         * @return float
         */
        public function getLatitude(): float
        {
            return $this->latitude;
        }

        /**
         * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
         *
         * @return float|int|null
         */
        public function getHorizontalAccuracy(): float|int|null
        {
            return $this->horizontal_accuracy;
        }

        /**
         * Optional. Time relative to the message sending date, during which the location can be updated; in seconds.
         * For active live locations only.
         *
         * @return int|null
         */
        public function getLivePeriod(): ?int
        {
            return $this->live_period;
        }

        /**
         * Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
         *
         * @return int|null
         */
        public function getHeading(): ?int
        {
            return $this->heading;
        }

        /**
         * Optional. The maximum distance for proximity alerts about approaching another chat member, in meters.
         * For sent live locations only.
         *
         * @return int|null
         */
        public function getProximityAlertRadius(): ?int
        {
            return $this->proximity_alert_radius;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,
                'horizontal_accuracy' => $this->horizontal_accuracy,
                'live_period' => $this->live_period,
                'heading' => $this->heading,
                'proximity_alert_radius' => $this->proximity_alert_radius
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Location
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->longitude = $data['longitude'] ?? null;
            $object->latitude = $data['latitude'] ?? null;
            $object->horizontal_accuracy = $data['horizontal_accuracy'] ?? null;
            $object->live_period = $data['live_period'] ?? null;
            $object->heading = $data['heading'] ?? null;
            $object->proximity_alert_radius = $data['proximity_alert_radius'] ?? null;

            return $object;
        }
    }