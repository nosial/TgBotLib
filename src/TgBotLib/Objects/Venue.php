<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Venue implements ObjectTypeInterface
    {
        private Location $location;
        private string $title;
        private string $address;
        private ?string $foursquare_id;
        private ?string $foursquare_type;
        private ?string $google_place_id;
        private ?string $google_place_type;

        /**
         * Venue location. Can't be a live location
         *
         * @return Location
         */
        public function getLocation(): Location
        {
            return $this->location;
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
         * Optional. Foursquare identifier of the venue
         *
         * @return string|null
         */
        public function getFoursquareId(): ?string
        {
            return $this->foursquare_id;
        }

        /**
         * Optional. Foursquare type of the venue.
         * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
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
         * Optional. Google Places type of the venue. (See supported types.)
         *
         * @see https://developers.google.com/places/web-service/supported_types
         * @return string|null
         */
        public function getGooglePlaceType(): ?string
        {
            return $this->google_place_type;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'location' => $this->location?->toArray(),
                'title' => $this->title,
                'address' => $this->address,
                'foursquare_id' => $this->foursquare_id,
                'foursquare_type' => $this->foursquare_type,
                'google_place_id' => $this->google_place_id,
                'google_place_type' => $this->google_place_type,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Venue
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;
            $object->title = $data['title'];
            $object->address = $data['address'];
            $object->foursquare_id = $data['foursquare_id'] ?? null;
            $object->foursquare_type = $data['foursquare_type'] ?? null;
            $object->google_place_id = $data['google_place_id'] ?? null;
            $object->google_place_type = $data['google_place_type'] ?? null;

            return $object;
        }
    }