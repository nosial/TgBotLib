<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InputMessageContent;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class
    InputVenueMessageContent implements ObjectTypeInterface
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
         * @var string
         */
        private $title;

        /**
         * @var string
         */
        private $address;

        /**
         * @var string|null
         */
        private $foursquare_id;

        /**
         * @var string|null
         */
        private $foursquare_type;

        /**
         * @var string|null
         */
        private $google_place_id;

        /**
         * @var string|null
         */
        private $google_place_type;

        /**
         * Latitude of the venue in degrees
         *
         * @return float
         */
        public function getLatitude(): float
        {
            return $this->latitude;
        }

        /**
         * Sets the value of 'latitude' property
         * Latitude of the venue in degrees
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
         * Longitude of the venue in degrees
         *
         * @return float
         */
        public function getLongitude(): float
        {
            return $this->longitude;
        }

        /**
         * Sets the value of 'longitude' property
         * Longitude of the venue in degrees
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
         * Name of the venue
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Sets the value of 'title' property
         * Name of the venue
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): self
        {
            $this->title = $title;
            return $this;
        }

        /**
         * Address of the venue
         *
         * @return string
         */
        public function getAddress(): string
        {
            return $this->address;
        }

        /**
         * Sets the value of 'address' property
         * Address of the venue
         *
         * @param string $address
         * @return $this
         */
        public function setAddress(string $address): self
        {
            $this->address = $address;
            return $this;
        }

        /**
         * Optional. Foursquare identifier of the venue, if known
         *
         * @return string|null
         */
        public function getFoursquareId(): ?string
        {
            return $this->foursquare_id;
        }

        /**
         * Sets the value of 'foursquare_id' property
         * Optional. Foursquare identifier of the venue, if known
         *
         * @param string|null $foursquare_id
         * @return $this
         */
        public function setFoursquareId(?string $foursquare_id): self
        {
            $this->foursquare_id = $foursquare_id;
            return $this;
        }

        /**
         * Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
         * “arts_entertainment/aquarium” or “food/icecream”.)
         *
         * @return string|null
         */
        public function getFoursquareType(): ?string
        {
            return $this->foursquare_type;
        }

        /**
         * Sets the value of 'foursquare_type' property
         * Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”,
         * “arts_entertainment/aquarium” or “food/icecream”.)
         *
         * @param string|null $foursquare_type
         * @return $this
         */
        public function setFoursquareType(?string $foursquare_type): self
        {
            $this->foursquare_type = $foursquare_type;
            return $this;
        }

        /**
         * Optional. Google Places identifier of the venue
         *
         * @return string|null
         */
        public function getGooglePlaceId(): ?string
        {
            return $this->google_place_id;
        }

        /**
         * Sets the value of 'google_place_id' property
         * Optional. Google Places identifier of the venue
         *
         * @param string|null $google_place_id
         * @return $this
         */
        public function setGooglePlaceId(?string $google_place_id): self
        {
            $this->google_place_id = $google_place_id;
            return $this;
        }

        /**
         * Optional. Google Places type of the venue.
         *
         * @return string|null
         * @see https://developers.google.com/places/web-service/supported_types
         */
        public function getGooglePlaceType(): ?string
        {
            return $this->google_place_type;
        }

        /**
         * Sets the value of 'google_place_type' property
         * Optional. Google Places type of the venue.
         *
         * @param string|null $google_place_type
         * @return $this
         */
        public function setGooglePlaceType(?string $google_place_type): self
        {
            $this->google_place_type = $google_place_type;
            return $this;
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
                'title' => $this->title,
                'address' => $this->address,
                'foursquare_id' => $this->foursquare_id,
                'foursquare_type' => $this->foursquare_type,
                'google_place_id' => $this->google_place_id,
                'google_place_type' => $this->google_place_type,
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
            $object->title = $data['title'] ?? null;
            $object->address = $data['address'] ?? null;
            $object->foursquare_id = $data['foursquare_id'] ?? null;
            $object->foursquare_type = $data['foursquare_type'] ?? null;
            $object->google_place_id = $data['google_place_id'] ?? null;
            $object->google_place_type = $data['google_place_type'] ?? null;

            return $object;
        }
    }