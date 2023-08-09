<?php /** @noinspection PhpUnused */

/** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

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
         * Location latitude in degrees
         *
         * @return float
         */
        public function getLatitude(): float
        {
            return $this->latitude;
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
         * Location title
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
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
         * Optional. Period in seconds for which the location can be updated should be between 60 and 86400.
         *
         * @return int|null
         */
        public function getLivePeriod(): ?int
        {
            return $this->live_period;
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
         * Optional. Inline keyboard attached to the message
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
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
         * Optional. Url of the thumbnail for the result
         *
         * @return string|null
         */
        public function getThumbnailUrl(): ?string
        {
            return $this->thumbnail_url;
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
         * Optional. Thumbnail height
         *
         * @return int|null
         */
        public function getThumbnailHeight(): ?int
        {
            return $this->thumbnail_height;
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