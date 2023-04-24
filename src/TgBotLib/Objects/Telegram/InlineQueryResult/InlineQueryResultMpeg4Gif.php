<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\Telegram\MessageEntity;

    class InlineQueryResultMpeg4Gif implements ObjectTypeInterface
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
         * @var string
         */
        private $mpeg4_url;

        /**
         * @var int|null
         */
        private $mpeg4_width;

        /**
         * @var int|null
         */
        private $mpeg4_height;

        /**
         * @var int|null
         */
        private $mpeg4_duration;

        /**
         * @var string
         */
        private $thumbnail_url;

        /**
         * @var string|null
         */
        private $thumbnail_mime_type;

        /**
         * @var string|null
         */
        private $title;

        /**
         * @var string|null
         */
        private $caption;

        /**
         * @var string|null
         */
        private $parse_mode;

        /**
         * @var MessageEntity[]|null
         */
        private $caption_entities;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        private $input_message_content;

        /**
         * InlineQueryResultMpeg4Gif constructor.
         */
        public function __construct()
        {
            $this->type = 'mpeg4_gif';
        }

        /**
         * Type of the result, must be mpeg4_gif
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Unique identifier for this result, 1-64 bytes
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * A valid URL for the MPEG4 file. File size must not exceed 1MB
         *
         * @return string
         */
        public function getMpeg4Url(): string
        {
            return $this->mpeg4_url;
        }

        /**
         * Optional. Video width
         *
         * @return int|null
         */
        public function getMpeg4Width(): ?int
        {
            return $this->mpeg4_width;
        }

        /**
         * Optional. Video height
         *
         * @return int|null
         */
        public function getMpeg4Height(): ?int
        {
            return $this->mpeg4_height;
        }

        /**
         * Optional. Video duration in seconds
         *
         * @return int|null
         */
        public function getMpeg4Duration(): ?int
        {
            return $this->mpeg4_duration;
        }

        /**
         * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
         *
         * @return string
         */
        public function getThumbnailUrl(): string
        {
            return $this->thumbnail_url;
        }

        /**
         * Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @return string|null
         */
        public function getThumbnailMimeType(): ?string
        {
            return $this->thumbnail_mime_type;
        }

        /**
         * Optional. Title for the result
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
        }

        /**
         * Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Mode for parsing entities in the caption. See formatting options for more details.
         *
         * @return string|null
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
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
         * Optional. Content of the message to be sent instead of the video animation
         *
         * @return InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        public function getInputMessageContent(): InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null
        {
            return $this->input_message_content;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type ?? null,
                'id' => $this->id ?? null,
                'mpeg4_url' => $this->mpeg4_url ?? null,
                'mpeg4_width' => $this->mpeg4_width ?? null,
                'mpeg4_height' => $this->mpeg4_height ?? null,
                'mpeg4_duration' => $this->mpeg4_duration ?? null,
                'thumbnail_url' => $this->thumbnail_url ?? null,
                'thumbnail_mime_type' => $this->thumbnail_mime_type ?? null,
                'title' => $this->title ?? null,
                'caption' => $this->caption ?? null,
                'parse_mode' => $this->parse_mode ?? null,
                'caption_entities' => ($this->caption_entities ?? null) ? array_map(function (MessageEntity $item) {
                    return $item->toArray();
                }, $this->caption_entities) : null,
                'reply_markup' => ($this->reply_markup ?? null) ? $this->reply_markup->toArray() : null,
                'input_message_content' => ($this->input_message_content ?? null) ? $this->input_message_content->toArray() : null,
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

            $object->type = $data['type'] ?? null;
            $object->id = $data['id'] ?? null;
            $object->mpeg4_url = $data['mpeg4_url'] ?? null;
            $object->mpeg4_width = $data['mpeg4_width'] ?? null;
            $object->mpeg4_height = $data['mpeg4_height'] ?? null;
            $object->mpeg4_duration = $data['mpeg4_duration'] ?? null;
            /** @noinspection DuplicatedCode */
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_mime_type = $data['thumbnail_mime_type'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = array_map(function ($item) {
                return MessageEntity::fromArray($item);
            }, $data['caption_entities'] ?? []);
            $object->reply_markup = ($data['reply_markup'] ?? null) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = ($data['input_message_content'] ?? null) ? InputVenueMessageContent::fromArray($data['input_message_content']) : null;

            return $object;
        }
    }