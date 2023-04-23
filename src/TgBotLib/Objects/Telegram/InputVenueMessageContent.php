<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InputVenueMessageContent implements ObjectTypeInterface
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
         * Longitude of the venue in degrees
         *
         * @return float
         */
        public function getLongitude(): float
        {
            return $this->longitude;
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
         * Address of the venue
         *
         * @return string
         */
        public function getAddress(): string
        {
            return $this->address;
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
         * Optional. Google Places identifier of the venue
         *
         * @return string|null
         */
        public function getGooglePlaceId(): ?string
        {
            return $this->google_place_id;
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