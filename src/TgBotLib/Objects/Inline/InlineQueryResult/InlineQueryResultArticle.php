<?php

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;

    class InlineQueryResultArticle extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $title;
        private InputMessageContent $input_message_content;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?string $url;
        private bool $hide_url;
        private ?string $description;
        private ?string $thumbnail_url;
        private ?int $thumbnail_width;
        private ?int $thumbnail_height;

        /**
         * Title of the result
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Sets the value of the 'title' field.
         * Title of the result
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultArticle
        {
            $this->title = $title;
            return $this;
        }

        /**
         * Content of the message to be sent
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of the 'input_message_content' field.
         * Content of the message to be sent
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultArticle
        {
            $this->input_message_content = $input_message_content;
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
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultArticle
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. URL of the result
         *
         * @return string|null
         */
        public function getUrl(): ?string
        {
            return $this->url;
        }

        /**
         * Sets the value of the 'url' field.
         * Optional. URL of the result
         *
         * @param string|null $url
         * @return $this
         */
        public function setUrl(?string $url): InlineQueryResultArticle
        {
            if(!Validate::url($url))
            {
                throw new InvalidArgumentException(sprintf('url is not a valid url: %s', $url));
            }

            $this->url = $url;
            return $this;
        }

        /**
         * Optional. Pass True if you don't want the URL to be shown in the message
         *
         * @return bool
         */
        public function isHideUrl(): bool
        {
            return $this->hide_url;
        }

        /**
         * Sets the value of the 'hide_url' field.
         * Optional. Pass True if you don't want the URL to be shown in the message
         *
         * @param bool $hide_url
         * @return $this
         */
        public function setHideUrl(bool $hide_url): InlineQueryResultArticle
        {
            $this->hide_url = $hide_url;
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
        public function setDescription(?string $description): InlineQueryResultArticle
        {
            $this->description = $description;
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
         * Sets the value of the 'thumbnail_url' field.
         * Optional. Url of the thumbnail for the result
         *
         * @param string|null $thumbnail_url
         * @return $this
         */
        public function setThumbnailUrl(?string $thumbnail_url): InlineQueryResultArticle
        {
            if(!Validate::url($thumbnail_url))
            {
                throw new InvalidArgumentException(sprintf('thumbnail_url is not a valid url: %s', $thumbnail_url));
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
        public function setThumbnailWidth(?int $thumbnail_width): InlineQueryResultArticle
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
        public function setThumbnailHeight(?int $thumbnail_height): InlineQueryResultArticle
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
                'input_message_content' => $this->input_message_content?->toArray(),
                'reply_markup' => $this->reply_markup?->toArray(),
                'url' => $this->url,
                'hide_url' => $this->hide_url,
                'description' => $this->description,
                'thumbnail_url' => $this->thumbnail_url,
                'thumbnail_width' => $this->thumbnail_width,
                'thumbnail_height' => $this->thumbnail_height
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultArticle
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::ARTICLE;
            $object->id = $data['id'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->input_message_content = isset($data['input_message_content']) ? InputMessageContent::fromArray($data['input_message_content']) : null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->url = $data['url'] ?? null;
            $object->hide_url = $data['hide_url'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = is_null($data['thumbnail_width']) ? null : (int)$data['thumbnail_width'];
            $object->thumbnail_height = is_null($data['thumbnail_height']) ? null : (int)$data['thumbnail_height'];

            return $object;
        }
    }