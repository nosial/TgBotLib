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

    class InlineQueryResultPhoto implements ObjectTypeInterface
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
        private $photo_url;

        /**
         * @var string
         */
        private $thumbnail_url;

        /**
         * @var int|null
         */
        private $photo_width;

        /**
         * @var int|null
         */
        private $photo_height;

        /**
         * @var string|null
         */
        private $title;

        /**
         * @var string|null
         */
        private $description;

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
         * Type of the result, must be photo
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
         * A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB
         *
         * @return string
         */
        public function getPhotoUrl(): string
        {
            return $this->photo_url;
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
         * Optional. Width of the photo
         *
         * @return int|null
         */
        public function getPhotoWidth(): ?int
        {
            return $this->photo_width;
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
         * Optional. Title for the result
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
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
         * Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
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
         * Optional. Content of the message to be sent instead of the photo
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
                'photo_url' => $this->photo_url,
                'thumbnail_url' => $this->thumbnail_url,
                'photo_width' => $this->photo_width ?? null,
                'photo_height' => $this->photo_height ?? null,
                'title' => $this->title ?? null,
                'description' => $this->description ?? null,
                'caption' => $this->caption ?? null,
                'parse_mode' => $this->parse_mode ?? null,
                'caption_entities' => ($this->caption_entities !== null) ? array_map(function (MessageEntity $messageEntity) {
                    return $messageEntity->toArray();
                }, $this->caption_entities) : null,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
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
            $object->photo_url = $data['photo_url'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->photo_width = $data['photo_width'] ?? null;
            $object->photo_height = $data['photo_height'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = ($data['caption_entities'] !== null) ? array_map(function (array $messageEntity)
            {
                return MessageEntity::fromArray($messageEntity);
            }, $data['caption_entities']) : null;
            $object->reply_markup = ($data['reply_markup'] !== null) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = $data['input_message_content'] ?? null;

            return $object;
        }
    }