<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\Telegram\MessageEntity;

    class InlineQueryResultVideo implements ObjectTypeInterface
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
        private $video_url;

        /**
         * @var string
         */
        private $mime_type;

        /**
         * @var string
         */
        private $thumbnail_url;

        /**
         * @var string
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
         * @var int|null
         */
        private $video_width;

        /**
         * @var int|null
         */
        private $video_height;

        /**
         * @var int|null
         */
        private $video_duration;

        /**
         * @var string|null
         */
        private $description;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        private $input_message_content;

        /**
         * InlineQueryResultVideo constructor.
         */
        public function __construct()
        {
            $this->type = 'video';
        }

        /**
         * Type of the result, must be video
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
         * A valid URL for the embedded video player or video file
         *
         * @return string
         */
        public function getVideoUrl(): string
        {
            return $this->video_url;
        }

        /**
         * MIME type of the content of the video URL, “text/html” or “video/mp4”
         *
         * @return string
         */
        public function getMimeType(): string
        {
            return $this->mime_type;
        }

        /**
         * URL of the thumbnail (JPEG only) for the video
         *
         * @return string
         */
        public function getThumbnailUrl(): string
        {
            return $this->thumbnail_url;
        }

        /**
         * Title for the result
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Optional. Caption of the video to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. Mode for parsing entities in the video caption. See formatting options for more details.
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
         * Optional. Video width
         *
         * @return int|null
         */
        public function getVideoWidth(): ?int
        {
            return $this->video_width;
        }

        /**
         * Optional. Video height
         *
         * @return int|null
         */
        public function getVideoHeight(): ?int
        {
            return $this->video_height;
        }

        /**
         * Optional. Video duration in seconds
         *
         * @return int|null
         */
        public function getVideoDuration(): ?int
        {
            return $this->video_duration;
        }

        /**
         * Optional. Short description of the result
         *
         * @return string|null
         */
        public function getDescription(): ?string
        {
            return $this->description;
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
         * Optional. Content of the message to be sent instead of the video. This field is required if
         * InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
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
                'type' => $this->type,
                'id' => $this->id,
                'video_url' => $this->video_url,
                'mime_type' => $this->mime_type,
                'thumbnail_url' => $this->thumbnail_url,
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => ($this->caption_entities ?? null) ? array_map(function (MessageEntity $item) {
                    return $item->toArray();
                }, $this->caption_entities) : null,
                'video_width' => $this->video_width,
                'video_height' => $this->video_height,
                'video_duration' => $this->video_duration,
                'description' => $this->description,
                'reply_markup' => ($this->reply_markup ?? null) ? $this->reply_markup->toArray() : null,
                'input_message_content' => $this->input_message_content,
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
            $object->video_url = $data['video_url'] ?? null;
            $object->mime_type = $data['mime_type'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(function ($item) {
                return MessageEntity::fromArray($item);
            }, $data['caption_entities']) : null;
            $object->video_width = $data['video_width'] ?? null;
            $object->video_height = $data['video_height'] ?? null;
            $object->video_duration = $data['video_duration'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null;

            return $object;
        }
    }