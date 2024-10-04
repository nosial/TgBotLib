<?php /** @noinspection PhpUnused */

/** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineKeyboardMarkup;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\InputMessageContent;
    use TgBotLib\Objects\InputMessageContent\InputContactMessageContent;

    class InlineQueryResultLocation extends InlineQueryResult implements ObjectTypeInterface
    {
        private float $latitude;
        private float $longitude;
        private string $title;
        private ?float $horizontal_accuracy;
        private ?int $live_period;
        private ?int $heading;
        private ?int $proximity_alert_radius;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;
        private ?string $thumbnail_url;
        private ?int $thumbnail_width;
        private ?int $thumbnail_height;

        /**
         * Location latitude in degrees
         *
         * @return float
         */
        public function getLatitude(): float
        {
            return $this->latitude;
        }

        /**
         * Sets the location latitude in degrees
         *
         * @param float $latitude
         * @return $this
         */
        public function setLatitude(float $latitude): InlineQueryResultLocation
        {
            $this->latitude = $latitude;
            return $this;
        }

        /**
         * Location longitude in degrees
         *
         * @return float
         */
        public function getLongitude(): float
        {
            return $this->longitude;
        }

        /**
         * Sets the location longitude in degrees
         *
         * @param float $longitude
         * @return $this
         */
        public function setLongitude(float $longitude): InlineQueryResultLocation
        {
            $this->longitude = $longitude;
            return $this;
        }

        /**
         * Location title
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Sets the location title
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultLocation
        {
            $this->title = $title;
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
         * Sets the radius of uncertainty for the location, measured in meters; 0-1500
         *
         * @param float|null $horizontal_accuracy
         * @return $this
         */
        public function setHorizontalAccuracy(?float $horizontal_accuracy): InlineQueryResultLocation
        {
            if($horizontal_accuracy < 0 || $horizontal_accuracy > 1500)
            {
                throw new InvalidArgumentException('horizontal_accuracy should be between 0 and 1500');
            }

            $this->horizontal_accuracy = $horizontal_accuracy;
            return $this;
        }


        /**
         * Optional. The Period in seconds for which the location can be updated should be between 60 and 86400.
         *
         * @return int|null
         */
        public function getLivePeriod(): ?int
        {
            return $this->live_period;
        }

        /**
         * Sets the period in seconds for which the location can be updated should be between 60 and 86400.
         *
         * @param int|null $live_period
         * @return $this
         */
        public function setLivePeriod(?int $live_period): InlineQueryResultLocation
        {
            if($live_period < 60 || $live_period > 86400)
            {
                throw new InvalidArgumentException('live_period should be between 60 and 86400');
            }

            $this->live_period = $live_period;
            return $this;
        }

        /**
         * Optional. For live locations, the direction in which the user is moving, in degrees. It Must be between 1 and 360 if specified.
         *
         * @return int|null
         */
        public function getHeading(): ?int
        {
            return $this->heading;
        }

        /**
         * Sets the direction in which the user is moving, in degrees. It Must be between 1 and 360 if specified.
         *
         * @param int|null $heading
         * @return $this
         */
        public function setHeading(?int $heading): InlineQueryResultLocation
        {
            if($heading < 1 || $heading > 360)
            {
                throw new InvalidArgumentException('heading should be between 1 and 360');
            }

            $this->heading = $heading;
            return $this;
        }

        /**
         * Optional. For live locations, a maximum distance for proximity alerts about
         * approaching another chat member, in meters. It Must be between 1 and 100000 if specified.
         *
         * @return int|null
         */
        public function getProximityAlertRadius(): ?int
        {
            return $this->proximity_alert_radius;
        }

        /**
         * Sets the maximum distance for proximity alerts about approaching another chat member, in meters.
         *
         * @param int|null $proximity_alert_radius
         * @return $this
         */
        public function setProximityAlertRadius(?int $proximity_alert_radius): InlineQueryResultLocation
        {
            if($proximity_alert_radius < 1 || $proximity_alert_radius > 100000)
            {
                throw new InvalidArgumentException('proximity_alert_radius should be between 1 and 100000');
            }

            $this->proximity_alert_radius = $proximity_alert_radius;
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
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultLocation
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the location
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the content of the message to be sent instead of the location
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultLocation
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
        public function setThumbnailUrl(?string $thumbnail_url): InlineQueryResultLocation
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
        public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultLocation
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
        public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultLocation
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
                'horizontal_accuracy' => $this->horizontal_accuracy,
                'live_period' => $this->live_period,
                'heading' => $this->heading,
                'proximity_alert_radius' => $this->proximity_alert_radius,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
                'input_message_content' => ($this->input_message_content instanceof InputContactMessageContent) ? $this->input_message_content->toArray() : null,
                'thumbnail_url' => $this->thumbnail_url,
                'thumbnail_width' => $this->thumbnail_width,
                'thumbnail_height' => $this->thumbnail_height,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultLocation
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::LOCATION;
            $object->id = $data['id'] ?? null;
            $object->latitude = $data['latitude'] ?? null;
            $object->longitude = $data['longitude'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->horizontal_accuracy = $data['horizontal_accuracy'] ?? null;
            $object->live_period = $data['live_period'] ?? null;
            $object->heading = $data['heading'] ?? null;
            $object->proximity_alert_radius = $data['proximity_alert_radius'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = $data['thumbnail_width'] ?? null;
            $object->thumbnail_height = $data['thumbnail_height'] ?? null;

            return $object;
        }
    }