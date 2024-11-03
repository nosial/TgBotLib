<?php

    /** @noinspection PhpUnused */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\Inline\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultDocument extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $title;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private string $document_url;
        private string $mime_type;
        private ?string $description;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;
        private ?string $thumbnail_url;
        private ?int $thumbnail_width;
        private ?int $thumbnail_height;

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
         * Sets the value of the 'title' field.
         * Title for the result
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultDocument
        {
            $this->title = $title;
            return $this;
        }

        /**
         * Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Sets the value of the 'caption' field.
         * Optional. Caption of the document to be sent, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InlineQueryResultDocument
        {
            if($caption == null)
            {
                $this->caption = null;
                return $this;
            }

            if(!Validate::length($caption, 0, 1024))
            {
                throw new InvalidArgumentException("Caption must be between 0 and 1024 characters");
            }

            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the document caption. See formatting options for more details.
         *
         * @return string|null
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Sets the value of the 'parse_mode' field.
         * Optional. Mode for parsing entities in the document caption. See formatting options for more details.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultDocument
        {
            if($parse_mode == null)
            {
                $this->parse_mode = null;
                return $this;
            }

            if(!in_array(strtolower($parse_mode), ['markdown', 'html']))
            {
                throw new InvalidArgumentException("Parse mode must be either Markdown or HTML");
            }

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
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultDocument
        {
            if($caption_entities == null)
            {
                $this->caption_entities = null;
                return $this;
            }

            foreach($caption_entities as $entity)
            {
                if(!($entity instanceof MessageEntity))
                {
                    throw new InvalidArgumentException("Caption entities must be an array of MessageEntity");
                }
            }

            $this->caption_entities = $caption_entities;
            return $this;
        }

        /**
         * A valid URL for the file
         *
         * @return string
         */
        public function getDocumentUrl(): string
        {
            return $this->document_url;
        }

        /**
         * Sets the value of the 'document_url' field.
         * A valid URL for the file
         *
         * @param string $document_url
         * @return $this
         */
        public function setDocumentUrl(string $document_url): InlineQueryResultDocument
        {
            if(!Validate::url($document_url))
            {
                throw new InvalidArgumentException("Document URL must be a valid URL");
            }

            $this->document_url = $document_url;
            return $this;
        }

        /**
         * MIME type of the content of the file, either “application/pdf” or “application/zip”
         *
         * @return string
         */
        public function getMimeType(): string
        {
            return $this->mime_type;
        }

        /**
         * Sets the value of the 'mime_type' field.
         * MIME type of the content of the file, either “application/pdf” or “application/zip”
         *
         * @param string $mime_type
         * @return $this
         */
        public function setMimeType(string $mime_type): InlineQueryResultDocument
        {
            $this->mime_type = $mime_type;
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
         * Sets the value of the 'description' field.
         * Optional. Short description of the result
         *
         * @param string|null $description
         * @return $this
         */
        public function setDescription(?string $description): InlineQueryResultDocument
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
         * Sets the value of the 'reply_markup' field.
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultDocument
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the file
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of the 'input_message_content' field.
         * Optional. Content of the message to be sent instead of the file
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultDocument
        {
            $this->input_message_content = $input_message_content;
            return $this;
        }

        /**
         * Optional. URL of the thumbnail (JPEG only) for the file
         *
         * @return string|null
         */
        public function getThumbnailUrl(): ?string
        {
            return $this->thumbnail_url;
        }

        /**
         * Sets the value of the 'thumbnail_url' field.
         * Optional. URL of the thumbnail (JPEG only) for the file
         *
         * @param string|null $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(?string $thumbnail_url): InlineQueryResultDocument
        {
            if($thumbnail_url != null && !Validate::url($thumbnail_url))
            {
                throw new InvalidArgumentException("Thumbnail URL must be a valid URL");
            }

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
         * Sets the value of the 'thumbnail_width' field.
         * Optional. Thumbnail width
         *
         * @param int|null $thumbnail_width
         * @return $this
         */
        public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultDocument
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
         * Sets the value of the 'thumbnail_height' field.
         * Optional. Thumbnail height
         *
         * @param int|null $thumbnail_height
         * @return $this
         */
        public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultDocument
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
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => array_map(fn(MessageEntity $entity) => $entity->toArray(), $this->caption_entities),
                'document_url' => $this->document_url,
                'mime_type' => $this->mime_type,
                'description' => $this->description,
                'reply_markup' => $this->reply_markup?->toArray(),
                'input_message_content' => $this->input_message_content?->toArray(),
                'thumbnail_url' => $this->thumbnail_url,
                'thumbnail_width' => $this->thumbnail_width,
                'thumbnail_height' => $this->thumbnail_height,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultDocument
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::DOCUMENT;
            $object->id = $data['id'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities']) : null;
            $object->document_url = $data['document_url'] ?? null;
            $object->mime_type = $data['mime_type'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = isset($data['input_message_content']) ? InputVenueMessageContent::fromArray($data['input_message_content']) : null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = $data['thumbnail_width'] ?? null;
            $object->thumbnail_height = $data['thumbnail_height'] ?? null;

            return $object;
        }
    }