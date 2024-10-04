<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineKeyboardMarkup;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultVideo extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $video_url;
        private string $mime_type;
        private string $thumbnail_url;
        private string $title;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?int $video_width;
        private ?int $video_height;
        private ?int $video_duration;
        private ?string $description;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;

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
         * Sets a valid URL for the embedded video player or video file
         *
         * @param string $video_url
         * @return $this
         */
        public function setVideoUrl(string $video_url): InlineQueryResultVideo
        {
            if(!filter_var($video_url, FILTER_VALIDATE_URL))
            {
                throw new InvalidArgumentException('Video URL must be a valid URL');
            }

            $this->video_url = $video_url;
            return $this;
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
         * Sets the MIME type of the content of the video URL, “text/html” or “video/mp4”
         *
         * @param string $mime_type
         * @return $this
         */
        public function setMimeType(string $mime_type): InlineQueryResultVideo
        {
            $this->mime_type = $mime_type;
            return $this;
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
         * Sets the URL of the thumbnail (JPEG only) for the video
         *
         * @param string $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(string $thumbnail_url): InlineQueryResultVideo
        {
            if(!filter_var($thumbnail_url, FILTER_VALIDATE_URL))
            {
                throw new InvalidArgumentException('Thumbnail URL must be a valid URL');
            }

            $this->thumbnail_url = $thumbnail_url;
            return $this;
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
         * Sets the title for the result
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultVideo
        {
            $this->title = $title;
            return $this;
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
         * Sets the caption of the video to be sent, 0-1024 characters after entities parsing
         *
         * @param string $caption
         * @return $this
         */
        public function setCaption(string $caption): InlineQueryResultVideo
        {
            $this->caption = $caption;
            return $this;
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
         * Sets the mode for parsing entities in the video caption. See formatting options for more details.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultVideo
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
         * Sets the list of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param array|null $caption_entities
         * @return $this
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultVideo
        {
            $this->caption_entities = $caption_entities;
            return $this;
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
         * Sets the video width
         *
         * @param int|null $video_width
         * @return $this
         */
        public function setVideoWidth(?int $video_width): InlineQueryResultVideo
        {
            $this->video_width = $video_width;
            return $this;
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
         * Sets the video height
         *
         * @param int|null $video_height
         * @return $this
         */
        public function setVideoHeight(?int $video_height): InlineQueryResultVideo
        {
            $this->video_height = $video_height;
            return $this;
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
         * Sets the video duration in seconds
         *
         * @param int|null $video_duration
         * @return $this
         */
        public function setVideoDuration(?int $video_duration): InlineQueryResultVideo
        {
            $this->video_duration = $video_duration;
            return $this;
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
         * Sets the short description of the result
         *
         * @param string|null $description
         * @return $this
         */
        public function setDescription(?string $description): InlineQueryResultVideo
        {
            $this->description = $description;
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
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultVideo
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the video. This field is required if
         * InlineQueryResultVideo is used to send an HTML-page as a result (e.g., a YouTube video).
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the content of the message to be sent instead of the video. This field is required if
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): static
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
                'type' => $this->type,
                'id' => $this->id,
                'video_url' => $this->video_url,
                'mime_type' => $this->mime_type,
                'thumbnail_url' => $this->thumbnail_url,
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => is_null($this->caption_entities) ? null : array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities),
                'video_width' => $this->video_width,
                'video_height' => $this->video_height,
                'video_duration' => $this->video_duration,
                'description' => $this->description,
                'reply_markup' => ($this->reply_markup ?? null) ? $this->reply_markup->toArray() : null,
                'input_message_content' => $this->input_message_content,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultVideo
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::VIDEO;
            $object->id = $data['id'] ?? null;
            $object->video_url = $data['video_url'] ?? null;
            $object->mime_type = $data['mime_type'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities']) : null;
            $object->video_width = $data['video_width'] ?? null;
            $object->video_height = $data['video_height'] ?? null;
            $object->video_duration = $data['video_duration'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null;

            return $object;
        }
    }