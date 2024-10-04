<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\Inline\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultMpeg4Gif extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $mpeg4_url;
        private ?int $mpeg4_width;
        private ?int $mpeg4_height;
        private ?int $mpeg4_duration;
        private string $thumbnail_url;
        private ?string $thumbnail_mime_type;
        private ?string $title;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;

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
         *
         *
         * @param string $mpeg4_url
         * @return $this
         */
        public function setMpeg4Url(string $mpeg4_url): InlineQueryResultMpeg4Gif
        {
            $this->mpeg4_url = $mpeg4_url;
            return $this;
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
         * Optional. Video width
         *
         * @param int|null $mpeg4_width
         * @return $this
         */
        public function setMpeg4Width(?int $mpeg4_width): InlineQueryResultMpeg4Gif
        {
            $this->mpeg4_width = $mpeg4_width;
            return $this;
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
         * Optional. Video height
         *
         * @param int|null $mpeg4_height
         * @return $this
         */
        public function setMpeg4Height(?int $mpeg4_height): InlineQueryResultMpeg4Gif
        {
            $this->mpeg4_height = $mpeg4_height;
            return $this;
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
         * Optional. Video duration in seconds
         *
         * @param int|null $mpeg4_duration
         * @return $this
         */
        public function setMpeg4Duration(?int $mpeg4_duration): InlineQueryResultMpeg4Gif
        {
            $this->mpeg4_duration = $mpeg4_duration;
            return $this;
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
         * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
         *
         * @param string $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(string $thumbnail_url): InlineQueryResultMpeg4Gif
        {
            $this->thumbnail_url = $thumbnail_url;
            return $this;
        }

        /**
         * Optional. MIME type of the thumbnail must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @return string|null
         */
        public function getThumbnailMimeType(): ?string
        {
            return $this->thumbnail_mime_type;
        }

        /**
         * Optional. MIME type of the thumbnail must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @param string|null $thumbnail_mime_type
         * @return $this
         */
        public function setThumbnailMimeType(?string $thumbnail_mime_type): InlineQueryResultMpeg4Gif
        {
            $this->thumbnail_mime_type = $thumbnail_mime_type;
            return $this;
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
         * Optional. Title for the result
         *
         * @param string|null $title
         * @return $this
         */
        public function setTitle(?string $title): InlineQueryResultMpeg4Gif
        {
            $this->title = $title;
            return $this;
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
         * Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InlineQueryResultMpeg4Gif
        {
            $this->caption = $caption;
            return $this;
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
         * Optional. Mode for parsing entities in the caption. See formatting options for more details.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultMpeg4Gif
        {
            $this->parse_mode = $parse_mode;
            return $this;
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
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param MessageEntity[]|null $caption_entities
         * @return $this
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultMpeg4Gif
        {
            $this->caption_entities = $caption_entities;
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
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultMpeg4Gif
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the video animation
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Optional. Content of the message to be sent instead of the video animation
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultMpeg4Gif
        {
            $this->input_message_content = $input_message_content;
            return $this;
        }

        /**
         * @inheritDoc
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
                'caption_entities' => is_null($this->caption_entities) ? array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities) : null,
                'reply_markup' => ($this->reply_markup ?? null) ? $this->reply_markup->toArray() : null,
                'input_message_content' => ($this->input_message_content ?? null) ? $this->input_message_content->toArray() : null,
            ];

        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultMpeg4Gif
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::MPEG_4_GIF;
            $object->id = $data['id'] ?? null;
            $object->mpeg4_url = $data['mpeg4_url'] ?? null;
            $object->mpeg4_width = $data['mpeg4_width'] ?? null;
            $object->mpeg4_height = $data['mpeg4_height'] ?? null;
            $object->mpeg4_duration = $data['mpeg4_duration'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_mime_type = $data['thumbnail_mime_type'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities']) : null;
            $object->reply_markup = ($data['reply_markup'] ?? null) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = ($data['input_message_content'] ?? null) ? InputVenueMessageContent::fromArray($data['input_message_content']) : null;

            return $object;
        }
    }