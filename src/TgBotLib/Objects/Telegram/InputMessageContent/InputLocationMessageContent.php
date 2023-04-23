<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InputMessageContent;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class
    InputLocationMessageContent implements ObjectTypeInterface
    {
        /**
         * @var float
         */
        private $latitude;

        /**
         * @var float
         */
        private $longitude;

        /**
         * @var float|null
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
         * Latitude of the location in degrees
         *
         * @return float
         */
        public function getLatitude(): float
        {
            return $this->latitude;
        }

        /**
         * Longitude of the location in degrees
         *
         * @return float
         */
        public function getLongitude(): float
        {
            return $this->longitude;
        }

        /**
         * Optional. The radius of uncertainty for the location, measured in meters; 0-1500
         *
         * @return float|null
         */
        public function getHorizontalAccuracy(): ?float
        {
            return $this->horizontal_accuracy;
        }

        /**
         * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
         *
         * @return int|null
         */
        public function getLivePeriod(): ?int
        {
            return $this->live_period;
        }

        /**
         * Optional. For live locations, a direction in which the user is moving, in degrees.
         * Must be between 1 and 360 if specified.
         *
         * @return int|null
         */
        public function getHeading(): ?int
        {
            return $this->heading;
        }

        /**
         * Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member,
         * in meters. Must be between 1 and 100000 if specified.
         *
         * @return int|null
         */
        public function getProximityAlertRadius(): ?int
        {
            return $this->proximity_alert_radius;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'horizontal_accuracy' => $this->horizontal_accuracy,
                'live_period' => $this->live_period,
                'heading' => $this->heading,
                'proximity_alert_radius' => $this->proximity_alert_radius,
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

            $object->latitude = (float)$data['latitude'] ?? null;
            $object->longitude = (float)$data['longitude'] ?? null;
            $object->horizontal_accuracy = (float)$data['horizontal_accuracy'] ?? null;
            $object->live_period = (int)$data['live_period'] ?? null;
            $object->heading = (int)$data['heading'] ?? null;
            $object->proximity_alert_radius = (int)$data['proximity_alert_radius'] ?? null;

            return $object;
        }
    }