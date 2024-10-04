<?php /** @noinspection PhpUnused */

/** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\Inline\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;

    class InlineQueryResultVenue extends InlineQueryResult implements ObjectTypeInterface
    {
        private float $latitude;
        private float $longitude;
        private string $title;
        private string $address;
        private ?string $foursquare_id;
        private ?string $foursquare_type;
        private ?string $google_place_id;
        private ?string $google_place_type;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;
        private ?string $thumbnail_url;
        private ?int $thumbnail_width;
        private ?int $thumbnail_height;

        /**
         * Latitude of the venue location in degrees
         *
         * @return float
         */
        public function getLatitude(): float
        {
            return $this->latitude;
        }

        /**
         * Sets the latitude of the venue location in degrees
         *
         * @param float $latitude
         * @return $this
         */
        public function setLatitude(float $latitude): InlineQueryResultVenue
        {
            $this->latitude = $latitude;
            return $this;
        }

        /**
         * Longitude of the venue location in degrees
         *
         * @return float
         */
        public function getLongitude(): float
        {
            return $this->longitude;
        }

        /**
         * Sets the longitude of the venue location in degrees
         *
         * @param float $longitude
         * @return $this
         */
        public function setLongitude(float $longitude): InlineQueryResultVenue
        {
            $this->longitude = $longitude;
            return $this;
        }

        /**
         * Title of the venue
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Sets the title of the venue
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultVenue
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
         * Sets the address of the venue
         *
         * @param string $address
         * @return $this
         */
        public function setAddress(string $address): InlineQueryResultVenue
        {
            $this->address = $address;
            return $this;
        }

        /**
         * Optional. Foursquare identifier of the venue if known
         *
         * @return string|null
         */
        public function getFoursquareId(): ?string
        {
            return $this->foursquare_id;
        }

        /**
         * Sets the foursquare identifier of the venue if known
         *
         * @param string|null $foursquare_id
         * @return $this
         */
        public function setFoursquareId(?string $foursquare_id): InlineQueryResultVenue
        {
            $this->foursquare_id = $foursquare_id;
            return $this;
        }

        /**
         * Optional. Foursquare type of the venue, if known.
         * (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
         *
         * @return string|null
         */
        public function getFoursquareType(): ?string
        {
            return $this->foursquare_type;
        }

        /**
         * Sets the foursquare type of the venue, if known.
         *
         * @param string|null $foursquare_type
         * @return $this
         */
        public function setFoursquareType(?string $foursquare_type): InlineQueryResultVenue
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
         * Sets the google places identifier of the venue
         *
         * @param string|null $google_place_id
         * @return $this
         */
        public function setGooglePlaceId(?string $google_place_id): InlineQueryResultVenue
        {
            $this->google_place_id = $google_place_id;
            return $this;
        }

        /**
         * Optional. Google Places type of the venue.
         *
         * @see https://developers.google.com/places/web-service/supported_types
         * @return string|null
         */
        public function getGooglePlaceType(): ?string
        {
            return $this->google_place_type;
        }

        /**
         * Sets the google places type of the venue.
         *
         * @param string|null $google_place_type
         * @return $this
         */
        public function setGooglePlaceType(?string $google_place_type): InlineQueryResultVenue
        {
            $this->google_place_type = $google_place_type;
            return $this;
        }

        /**
         * Optional. Inline keyboard attached to the message
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
        }

        /**
         * Sets the inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultVenue
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the venue
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the content of the message to be sent instead of the venue
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultVenue
        {
            $this->input_message_content = $input_message_content;
            return $this;
        }

        /**
         * Optional. Url of the thumbnail for the result
         *
         * @return string|null
         */
        public function getThumbnailUrl(): ?string
        {
            return $this->thumbnail_url;
        }

        /**
         * Sets the url of the thumbnail for the result
         *
         * @param string|null $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(?string $thumbnail_url): InlineQueryResultVenue
        {
            $this->thumbnail_url = $thumbnail_url;
            return $this;
        }

        /**
         * Optional. Thumbnail width
         *
         * @return int|null
         */
        public function getThumbnailWidth(): ?int
        {
            return $this->thumbnail_width;
        }

        /**
         * Sets the thumbnail width
         *
         * @param int|null $thumbnail_width
         * @return $this
         */
        public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultVenue
        {
            $this->thumbnail_width = $thumbnail_width;
            return $this;
        }

        /**
         * Optional. Thumbnail height
         *
         * @return int|null
         */
        public function getThumbnailHeight(): ?int
        {
            return $this->thumbnail_height;
        }

        /**
         * Sets the thumbnail height
         *
         * @param int|null $thumbnail_height
         * @return $this
         */
        public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultVenue
        {
            $this->thumbnail_height = $thumbnail_height;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'id' => $this->id,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'title' => $this->title,
                'address' => $this->address,
                'foursquare_id' => $this->foursquare_id,
                'foursquare_type' => $this->foursquare_type,
                'google_place_id' => $this->google_place_id,
                'google_place_type' => $this->google_place_type,
                'reply_markup' => $this->reply_markup?->toArray(),
                'input_message_content' => $this->input_message_content?->toArray(),
                'thumbnail_url' => $this->thumbnail_url,
                'thumbnail_width' => $this->thumbnail_width,
                'thumbnail_height' => $this->thumbnail_height
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultVenue
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::VENUE;
            $object->id = $data['id'] ?? null;
            $object->latitude = $data['latitude'] ?? null;
            $object->longitude = $data['longitude'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->address = $data['address'] ?? null;
            $object->foursquare_id = $data['foursquare_id'] ?? null;
            $object->foursquare_type = $data['foursquare_type'] ?? null;
            $object->google_place_id = $data['google_place_id'] ?? null;
            $object->google_place_type = $data['google_place_type'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputVenueMessageContent::fromArray($data['input_message_content']) : null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = $data['thumbnail_width'] ?? null;
            $object->thumbnail_height = $data['thumbnail_height'] ?? null;

            return $object;
        }
    }