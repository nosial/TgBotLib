<?php /** @noinspection PhpUnused */

/** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent;

    class InlineQueryResultLocation implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var string
         */
        private $id;

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
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        private $input_message_content;

        /**
         * @var string|null
         */
        private $thumbnail_url;

        /**
         * @var int|null
         */
        private $thumbnail_width;

        /**
         * @var int|null
         */
        private $thumbnail_height;

        /**
         * InlineQueryResultLocation constructor.
         */
        public function __construct()
        {
            $this->type = 'location';
        }

        /**
         * Type of the result must be location
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Unique identifier for this result, 1-64 Bytes
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Sets a unique identifier for this result, 1-64 Bytes
         *
         * @param string $id
         * @return $this
         */
        public function setId(string $id): InlineQueryResultLocation
        {
            if(strlen($id) > 64)
            {
                throw new InvalidArgumentException('id should be less than 64 characters');
            }

            $this->id = $id;
            return $this;
        }

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
         * @return InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        public function getInputMessageContent(): InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null
        {
            return $this->input_message_content;
        }

        /**
         * Sets the content of the message to be sent instead of the location
         *
         * @param InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(null|InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent $input_message_content): InlineQueryResultLocation
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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
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
         * Constructs the object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->type = $data['type'] ?? null;
            $object->id = $data['id'] ?? null;
            $object->latitude = $data['latitude'] ?? null;
            $object->longitude = $data['longitude'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->horizontal_accuracy = $data['horizontal_accuracy'] ?? null;
            $object->live_period = $data['live_period'] ?? null;
            $object->heading = $data['heading'] ?? null;
            $object->proximity_alert_radius = $data['proximity_alert_radius'] ?? null;
            $object->reply_markup = ($data['reply_markup'] ?? null) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = ($data['input_message_content'] ?? null) ? InputContactMessageContent::fromArray($data['input_message_content']) : null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = $data['thumbnail_width'] ?? null;
            $object->thumbnail_height = $data['thumbnail_height'] ?? null;

            return $object;
        }
    }