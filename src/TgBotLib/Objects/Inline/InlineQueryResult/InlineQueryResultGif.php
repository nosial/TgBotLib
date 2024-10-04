<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Enums\Types\ThumbnailMimeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultGif extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $gif_url;
        private ?int $gif_width;
        private ?int $gif_height;
        private ?int $gif_duration;
        private ?string $thumbnail_url;
        private ?ThumbnailMimeType $thumbnail_mime_type;
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
         * A valid URL for the GIF file. File size must not exceed 1MB
         *
         * @return string
         */
        public function getGifUrl(): string
        {
            return $this->gif_url;
        }

        /**
         * Sets the value of the 'gif_url' field.
         * A valid URL for the GIF file. File size must not exceed 1MB
         *
         * @param string $gif_url
         * @return $this
         */
        public function setGifUrl(string $gif_url): InlineQueryResultGif
        {
            if(!Validate::url($gif_url))
            {
                throw new InvalidArgumentException(sprintf('"%s" is not a valid url', $gif_url));
            }

            $this->gif_url = $gif_url;
            return $this;
        }

        /**
         * Optional. Width of the GIF
         *
         * @return int|null
         */
        public function getGifWidth(): ?int
        {
            return $this->gif_width;
        }

        /**
         * Sets the value of the 'gif_width' field.
         * Optional. Width of the GIF
         *
         * @param int $gif_width
         * @return $this
         */
        public function setGifWidth(int $gif_width): InlineQueryResultGif
        {
            $this->gif_width = $gif_width;
            return $this;
        }

        /**
         * Optional. Height of the GIF
         *
         * @return int|null
         */
        public function getGifHeight(): ?int
        {
            return $this->gif_height;
        }

        /**
         * Sets the value of the 'gif_height' field.
         * Optional. Height of the GIF
         *
         * @param int|null $gif_height
         * @return $this
         */
        public function setGifHeight(?int $gif_height): InlineQueryResultGif
        {
            if(is_null($gif_height))
            {
                $this->gif_height = null;
                return $this;
            }

            $this->gif_height = $gif_height;
            return $this;
        }

        /**
         * Optional. Duration of the GIF in seconds
         *
         * @return int|null
         */
        public function getGifDuration(): ?int
        {
            return $this->gif_duration;
        }

        /**
         * Sets the value of the 'gif_duration' field.
         * Optional. Duration of the GIF in seconds
         *
         * @param int|null $gif_duration
         * @return $this
         */
        public function setGifDuration(?int $gif_duration): InlineQueryResultGif
        {
            if(is_null($gif_duration))
            {
                $this->gif_duration = null;
                return $this;
            }

            $this->gif_duration = $gif_duration;
            return $this;
        }

        /**
         * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
         *
         * @return string|null
         */
        public function getThumbnailUrl(): ?string
        {
            return $this->thumbnail_url;
        }

        /**
         * Sets the value of the 'thumbnail_url' field.
         * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
         *
         * @param string $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(string $thumbnail_url): InlineQueryResultGif
        {
            if(!Validate::url($thumbnail_url))
            {
                throw new InvalidArgumentException(sprintf('"%s" is not a valid url', $thumbnail_url));
            }

            $this->thumbnail_url = $thumbnail_url;
            return $this;
        }

        /**
         * Optional. MIME type of the thumbnail must be one of “image/jpeg,” “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @return ThumbnailMimeType|null
         */
        public function getThumbnailMimeType(): ?ThumbnailMimeType
        {
            return $this->thumbnail_mime_type;
        }

        /**
         * Sets the value of the 'thumbnail_mime_type' field.
         * Optional. MIME type of the thumbnail must be one of “image/jpeg,” “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @param string|ThumbnailMimeType|null $thumbnail_mime_type
         * @return $this
         */
        public function setThumbnailMimeType(string|ThumbnailMimeType|null $thumbnail_mime_type): InlineQueryResultGif
        {
            if(is_null($thumbnail_mime_type))
            {
                $this->thumbnail_mime_type = null;
                return $this;
            }

            if(is_string($thumbnail_mime_type))
            {
                $thumbnail_mime_type = ThumbnailMimeType::tryFrom($thumbnail_mime_type);
            }

            if($thumbnail_mime_type === null)
            {
                throw new InvalidArgumentException('Unexpected type for ThumbnailMimeType');
            }

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
         * Sets the value of the 'title' field.
         * Optional. Title for the result
         *
         * @param string|null $title
         * @return $this
         */
        public function setTitle(?string $title): InlineQueryResultGif
        {
            $this->title = $title;
            return $this;
        }

        /**
         * Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Sets the value of the 'caption' field.
         * Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InlineQueryResultGif
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
         * Sets the value of the 'parse_mode' field.
         * Optional. Mode for parsing entities in the caption. See formatting options for more details.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultGif
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
         * Sets the value of the 'caption_entities' field.
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param MessageEntity[]|null $caption_entities
         * @return $this
         * @noinspection DuplicatedCode
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultGif
        {
            if($caption_entities === null)
            {
                $this->caption_entities = null;
                return $this;
            }

            $this->caption_entities = [];
            foreach($caption_entities as $entity)
            {
                if(!$entity instanceof MessageEntity)
                {
                    throw new InvalidArgumentException(sprintf('caption_entities must be array of MessageEntity, got %s', gettype($entity)));
                }

                $this->caption_entities[] = $entity;
            }

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
         * Sets the value of the 'reply_markup' field.
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultGif
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the GIF animation
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of the 'input_message_content' field.
         * Optional. Content of the message to be sent instead of the GIF animation
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultGif
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
                'type' => $this->type->value,
                'id' => $this->id ?? null,
                'gif_url' => $this->gif_url ?? null,
                'gif_width' => $this->gif_width ?? null,
                'gif_height' => $this->gif_height ?? null,
                'gif_duration' => $this->gif_duration ?? null,
                'thumbnail_url' => $this->thumbnail_url ?? null,
                'thumbnail_mime_type' => $this->thumbnail_mime_type ?? null,
                'title' => $this->title ?? null,
                'caption' => $this->caption ?? null,
                'parse_mode' => $this->parse_mode ?? null,
                'caption_entities' => array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities),
                'reply_markup' => $this->reply_markup?->toArray(),
                'input_message_content' => $this->input_message_content?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultGif
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::GIF;
            $object->id = $data['id'] ?? null;
            $object->gif_url = $data['gif_url'] ?? null;
            $object->gif_width = $data['gif_width'] ?? null;
            $object->gif_height = $data['gif_height'] ?? null;
            $object->gif_duration = $data['gif_duration'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_mime_type = $data['thumbnail_mime_type'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities']) : null;
            $object->reply_markup = isset($data['reply_markup']) ? array_map(fn(array $items) => InlineKeyboardMarkup::fromArray($items), $data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null;

            return $object;
        }
    }