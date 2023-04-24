<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

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
         * Type of the result, must be article
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
         * Title of the result
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
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
         * Optional. Inline keyboard attached to the message
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
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
         * Optional. Pass True if you don't want the URL to be shown in the message
         *
         * @return bool
         */
        public function isHideUrl(): bool
        {
            return $this->hide_url;
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
                'title' => $this->title,
                'input_message_content' => ($this->input_message_content instanceof ObjectTypeInterface) ? $this->input_message_content->toArray() : null,
                'reply_markup' => ($this->reply_markup instanceof ObjectTypeInterface) ? $this->reply_markup->toArray() : null,
                'url' => $this->url,
                'hide_url' => $this->hide_url,
                'description' => $this->description,
                'thumb_url' => $this->thumbnail_url,
                'thumb_width' => $this->thumbnail_width,
                'thumb_height' => $this->thumbnail_height
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
            $object->title = $data['title'] ?? null;
            $object->input_message_content = InputMessageContent::fromArray($data['input_message_content'] ?? []);
            $object->reply_markup = InlineKeyboardMarkup::fromArray($data['reply_markup'] ?? []);
            $object->url = $data['url'] ?? null;
            $object->hide_url = $data['hide_url'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->thumbnail_url = $data['thumb_url'] ?? null;
            $object->thumbnail_width = (int)$data['thumb_width'] ?? null;
            $object->thumbnail_height = (int)$data['thumb_height'] ?? null;

            return $object;
        }
    }