<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMessageContent;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InputMessageContentType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMessageContent;

    class InputLocationMessageContent extends InputMessageContent implements ObjectTypeInterface
    {
        private float $latitude;
        private float $longitude;
        private ?float $horizontal_accuracy;
        private ?int $live_period;
        private ?int $heading;
        private ?int $proximity_alert_radius;

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
         * Sets the value of 'latitude' property
         * Latitude of the location in degrees
         *
         * @param float $latitude
         * @return $this
         */
        public function setLatitude(float $latitude): self
        {
            $this->latitude = $latitude;
            return $this;
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
         * Sets the value of 'longitude' property
         * Longitude of the location in degrees
         *
         * @param float $longitude
         * @return $this
         */
        public function setLongitude(float $longitude): self
        {
            $this->longitude = $longitude;
            return $this;
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
         * Sets the value of 'horizontal_accuracy' property
         *
         * @param float|null $horizontal_accuracy
         * @return $this
         */
        public function setHorizontalAccuracy(?float $horizontal_accuracy): self
        {
            if($horizontal_accuracy == null)
            {
                $this->horizontal_accuracy = null;
                return $this;
            }

            $this->horizontal_accuracy = $horizontal_accuracy;
            return $this;
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
         * Sets the value of 'live_period' property
         * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
         *
         * @param int|null $live_period
         * @return $this
         */
        public function setLivePeriod(?int $live_period): self
        {
            if($live_period)
            {
                $this->live_period = null;
                return $this;
            }

            if($live_period < 60 || $live_period > 86400)
            {
                throw new InvalidArgumentException('live_period should be a value between 60-86400');
            }

            $this->live_period = $live_period;
            return $this;
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
         * Sets the value of 'heading' property
         * Optional. For live locations, a direction in which the user is moving, in degrees.
         * Must be between 1 and 360 if specified.
         *
         * @param int|null $heading
         * @return $this
         */
        public function setHeading(?int $heading): self
        {
            if($heading == null)
            {
                $this->heading = null;
                return $this;
            }

            if($heading < 1 || $heading > 360)
            {
                throw new InvalidArgumentException('heading should be a value between 1-360');
            }

            $this->heading = $heading;
            return $this;
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
         * Sets the value of 'proximity_alert_radius' property
         * Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member,
         *
         * @param int|null $proximity_alert_radius
         * @return $this
         */
        public function setProximityAlertRadius(?int $proximity_alert_radius): self
        {
            if($proximity_alert_radius == null)
            {
                $this->proximity_alert_radius = null;
                return $this;
            }

            if(!Validate::length($proximity_alert_radius, 1, 100000))
            {
                throw new InvalidArgumentException('proximity_alert_radius should be between 1-100000 characters');
            }

            $this->proximity_alert_radius = $proximity_alert_radius;
            return $this;
        }

        /**
         * @inheritDoc
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
         * @inheritDoc
         */
        public static function fromArray(array $data): InputLocationMessageContent
        {
            $object = new self();

            $object->type = InputMessageContentType::LOCATION;
            $object->latitude = (float)$data['latitude'] ?? null;
            $object->longitude = (float)$data['longitude'] ?? null;
            $object->horizontal_accuracy = (float)$data['horizontal_accuracy'] ?? null;
            $object->live_period = (int)$data['live_period'] ?? null;
            $object->heading = (int)$data['heading'] ?? null;
            $object->proximity_alert_radius = (int)$data['proximity_alert_radius'] ?? null;

            return $object;
        }
    }