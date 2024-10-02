<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Location implements ObjectTypeInterface
    {
        /**
         * @var float
         */
        private $longitude;

        /**
         * @var float
         */
        private $latitude;

        /**
         * @var float|int|null
         */
        private $horizontal_accuracy;

        /**
         * @var int|null
         */
        private $live_period;

        /**
         * @var int|null
         */
        private $heading;

        /**
         * @var int|null
         */
        private $proximity_alert_radius;

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
         * Returns an array representation of the object.
         *
         * @return array
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
         * Constructs an object from an array representation.
         *
         * @param array $data
         * @return Location
         */
        public static function fromArray(array $data): self
        {
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