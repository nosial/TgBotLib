<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Enums\ThumbnailMimeType;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\Telegram\MessageEntity;

    class InlineQueryResultGif implements ObjectTypeInterface
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
        private $gif_url;

        /**
         * @var int|null
         */
        private $gif_width;

        /**
         * @var int|null
         */
        private $gif_height;

        /**
         * @var int|null
         */
        private $gif_duration;

        /**
         * @var string|null
         */
        private $thumbnail_url;

        /**
         * @var string|null
         * @see ThumbnailMimeType
         */
        private $thumbnail_mime_type;

        /**
         * @var string|null
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
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        private $input_message_content;

        /**
         * InlineQueryResultGif constructor.
         */
        public function __construct()
        {
            $this->type = 'gif';
        }

        /**
         * Type of the result, must be gif
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
         * Sets the value of the 'id' field.
         * Unique identifier for this result, 1-64 bytes
         *
         * @param string $id
         * @return $this
         */
        public function setId(string $id): InlineQueryResultGif
        {
            if(!Validate::length($id, 1, 64))
            {
                throw new InvalidArgumentException();
            }

            $this->id = $id;
            return $this;
        }

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
         * Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @return string|null
         */
        public function getThumbnailMimeType(): ?string
        {
            return $this->thumbnail_mime_type;
        }

        /**
         * Sets the value of the 'thumbnail_mime_type' field.
         * Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. Defaults to “image/jpeg”
         *
         * @param string|null $thumbnail_mime_type
         * @return $this
         */
        public function setThumbnailMimeType(?string $thumbnail_mime_type): InlineQueryResultGif
        {
            if(is_null($thumbnail_mime_type))
            {
                $this->thumbnail_mime_type = null;
                return $this;
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
         * @return InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        public function getInputMessageContent(): InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of the 'input_message_content' field.
         * Optional. Content of the message to be sent instead of the GIF animation
         *
         * @param InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null $input_message_content): InlineQueryResultGif
        {
            $this->input_message_content = $input_message_content;
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
                'type' => $this->type ?? null,
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
                'caption_entities' => (static function (array $captionEntities)
                {
                    $result = [];
                    foreach($captionEntities as $captionEntity)
                    {
                        $result[] = $captionEntity->toArray();
                    }
                    return $result;
                })($this->caption_entities ?? []),
                'reply_markup' => (static function (InlineKeyboardMarkup|null $replyMarkup) {
                    return $replyMarkup?->toArray();
                })($this->reply_markup ?? null),
                'input_message_content' => (static function (ObjectTypeInterface|null $inputMessageContent) {
                    return $inputMessageContent?->toArray();
                })($this->input_message_content ?? null),
            ];
        }

        /**
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         * @noinspection DuplicatedCode
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->type = $data['type'] ?? null;
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

            $object->caption_entities = (static function (array $captionEntities)
            {
                $result = [];
                foreach($captionEntities as $captionEntity)
                {
                    $result[] = MessageEntity::fromArray($captionEntity);
                }

                return $result;
            })($data['caption_entities'] ?? []);

            $object->reply_markup = (static function (array|null $replyMarkup)
            {
                if($replyMarkup !== null)
                {
                    return InlineKeyboardMarkup::fromArray($replyMarkup);
                }

                return null;
            })($data['reply_markup'] ?? null);

            $object->input_message_content = (static function (array|null $inputMessageContent)
            {
                if($inputMessageContent !== null)
                {
                    return InputVenueMessageContent::fromArray($inputMessageContent);
                }

                return null;
            })($data['input_message_content'] ?? null);

            return $object;
        }
    }