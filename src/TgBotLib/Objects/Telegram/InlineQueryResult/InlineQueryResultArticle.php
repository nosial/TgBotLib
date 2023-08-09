<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent;

    class InlineQueryResultArticle implements ObjectTypeInterface
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
        private $title;

        /**
         * @var InputTextMessageContent|InputLocationMessageContent|InputVenueMessageContent|InputContactMessageContent|null
         */
        private $input_message_content;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var string|null
         */
        private $url;

        /**
         * @var bool
         */
        private $hide_url;

        /**
         * @var string|null
         */
        private $description;

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
         * InlineQueryResultArticle constructor.
         */
        public function __construct()
        {
            $this->type = 'article';
        }

        /**
         * The Type of the result must be article
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
         * Sets the value of the 'id' field.
         * Unique identifier for this result, 1-64 Bytes
         *
         * @param string $id
         * @return $this
         */
        public function setId(string $id): InlineQueryResultArticle
        {
            if(!Validate::length($id, 1, 64))
            {
                throw new InvalidArgumentException('id should be between 1-64 characters');
            }

            $this->id = $id;
            return $this;
        }

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
         * @return InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        public function getInputMessageContent(): InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|null
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of the 'input_message_content' field.
         * Content of the message to be sent
         *
         * @param InputContactMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|null $input_message_content): InlineQueryResultArticle
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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'id' => $this->id,
                'title' => $this->title,
                'input_message_content' => ($this->input_message_content instanceof ObjectTypeInterface) ? $this->input_message_content->toArray() : null,
                'reply_markup' => ($this->reply_markup instanceof ObjectTypeInterface) ? $this->reply_markup->toArray() : null,
                'url' => $this->url,
                'hide_url' => $this->hide_url,
                'description' => $this->description,
                'thumbnail_url' => $this->thumbnail_url,
                'thumbnail_width' => $this->thumbnail_width,
                'thumbnail_height' => $this->thumbnail_height
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->type = $data['type'] ?? null;
            $object->id = $data['id'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->input_message_content = InputMessageContent::fromArray($data['input_message_content'] ?? []);
            $object->reply_markup = InlineKeyboardMarkup::fromArray($data['reply_markup'] ?? []);
            $object->url = $data['url'] ?? null;
            $object->hide_url = $data['hide_url'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_width = is_null($data['thumbnail_width']) ? null : (int)$data['thumbnail_width'];
            $object->thumbnail_height = is_null($data['thumbnail_height']) ? null : (int)$data['thumbnail_height'];

            return $object;
        }
    }