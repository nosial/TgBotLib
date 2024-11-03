<?php

    /** @noinspection PhpUnused */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\Inline\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultPhoto extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $photo_url;
        private string $thumbnail_url;
        private ?int $photo_width;
        private ?int $photo_height;
        private ?string $title;
        private ?string $description;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputTextMessageContent $input_message_content;

        /**
         * A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
         *
         * @return string
         */
        public function getPhotoUrl(): string
        {
            return $this->photo_url;
        }

        /**
         * Sets the value of the 'photo_url' field
         *
         * @param string $photo_url
         * @return $this
         */
        public function setPhotoUrl(string $photo_url): InlineQueryResultPhoto
        {
            $this->photo_url = $photo_url;
            return $this;
        }

        /**
         * URL of the thumbnail for the photo
         *
         * @return string
         */
        public function getThumbnailUrl(): string
        {
            return $this->thumbnail_url;
        }

        /**
         * Sets the value of the 'thumbnail_url' field
         *
         * @param string $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(string $thumbnail_url): InlineQueryResultPhoto
        {
            if(!filter_var($thumbnail_url, FILTER_VALIDATE_URL))
            {
                throw new InvalidArgumentException('thumbnail_url must be a valid URL');
            }

            $this->thumbnail_url = $thumbnail_url;
            return $this;
        }

        /**
         * Optional. Width of the photo
         *
         * @return int|null
         */
        public function getPhotoWidth(): ?int
        {
            return $this->photo_width;
        }

        /**
         * Sets the value of the 'photo_width' field
         *
         * @param int|null $photo_width
         * @return $this
         */
        public function setPhotoWidth(?int $photo_width): InlineQueryResultPhoto
        {
            $this->photo_width = $photo_width;
            return $this;
        }

        /**
         * Optional. Height of the photo
         *
         * @return int|null
         */
        public function getPhotoHeight(): ?int
        {
            return $this->photo_height;
        }

        /**
         * Sets the value of the 'photo_height' field
         *
         * @param int|null $photo_height
         * @return $this
         */
        public function setPhotoHeight(?int $photo_height): InlineQueryResultPhoto
        {
            $this->photo_height = $photo_height;
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
         * Sets the value of the 'title' field
         *
         * @param string|null $title
         * @return $this
         */
        public function setTitle(?string $title): InlineQueryResultPhoto
        {
            $this->title = $title;
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
         * Sets the value of the 'description' field
         *
         * @param string|null $description
         * @return $this
         */
        public function setDescription(?string $description): InlineQueryResultPhoto
        {
            $this->description = $description;
            return $this;
        }

        /**
         * Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Sets the value of the 'caption' field
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InlineQueryResultPhoto
        {
            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the photo caption. See formatting options for more details.
         *
         * @return string|null
         * @link https://core.telegram.org/bots/api#formatting-options
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Sets the value of the 'parse_mode' field
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultPhoto
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
         * Sets the value of the 'caption_entities' field
         *
         * @param array|null $caption_entities
         * @return $this
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultPhoto
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
         * Sets the value of the 'reply_markup' field
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultPhoto
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the photo
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of the 'input_message_content' field
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultPhoto
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
                'photo_url' => $this->photo_url,
                'thumbnail_url' => $this->thumbnail_url,
                'photo_width' => $this->photo_width ?? null,
                'photo_height' => $this->photo_height ?? null,
                'title' => $this->title ?? null,
                'description' => $this->description ?? null,
                'caption' => $this->caption ?? null,
                'parse_mode' => $this->parse_mode ?? null,
                'caption_entities' => isset($data['caption_entities']) ? array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities) : null,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultPhoto
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::PHOTO;
            $object->id = $data['id'] ?? null;
            $object->photo_url = $data['photo_url'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->photo_width = $data['photo_width'] ?? null;
            $object->photo_height = $data['photo_height'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities']) : null;
            $object->reply_markup = ($data['reply_markup'] !== null) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = $data['input_message_content'] ?? null;

            return $object;
        }
    }