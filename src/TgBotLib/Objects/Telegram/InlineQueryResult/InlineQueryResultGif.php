<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use TgBotLib\Abstracts\ThumbnailMimeType;
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
         * A valid URL for the GIF file. File size must not exceed 1MB
         *
         * @return string
         */
        public function getGifUrl(): string
        {
            return $this->gif_url;
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
         * Optional. Height of the GIF
         *
         * @return int|null
         */
        public function getGifHeight(): ?int
        {
            return $this->gif_height;
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
         * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result
         *
         * @return string|null
         */
        public function getThumbnailUrl(): ?string
        {
            return $this->thumbnail_url;
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
         * Optional. Title for the result
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
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
         * Optional. Mode for parsing entities in the caption. See formatting options for more details.
         *
         * @return string|null
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
         * Optional. Content of the message to be sent instead of the GIF animation
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
                'caption_entities' => (function (array $captionEntities)
                {
                    $result = [];
                    foreach($captionEntities as $captionEntity)
                    {
                        $result[] = $captionEntity->toArray();
                    }
                    return $result;

                })($this->caption_entities ?? []),
                'reply_markup' => (function (InlineKeyboardMarkup|null $replyMarkup)
                {
                    if($replyMarkup !== null)
                    {
                        return $replyMarkup->toArray();
                    }

                    return null;
                })($this->reply_markup ?? null),
                'input_message_content' => (function (ObjectTypeInterface|null $inputMessageContent)
                {
                    if($inputMessageContent !== null)
                    {
                        return $inputMessageContent->toArray();
                    }

                    return null;

                })($this->input_message_content ?? null),
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
            $object->gif_url = $data['gif_url'] ?? null;
            $object->gif_width = $data['gif_width'] ?? null;
            $object->gif_height = $data['gif_height'] ?? null;
            $object->gif_duration = $data['gif_duration'] ?? null;
            $object->thumbnail_url = $data['thumbnail_url'] ?? null;
            $object->thumbnail_mime_type = $data['thumbnail_mime_type'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = (function (array $captionEntities)
            {
                $result = [];
                foreach($captionEntities as $captionEntity)
                {
                    $result[] = MessageEntity::fromArray($captionEntity);
                }
                return $result;

            })($data['caption_entities'] ?? []);
            $object->reply_markup = (function (array|null $replyMarkup)
            {
                if($replyMarkup !== null)
                {
                    return InlineKeyboardMarkup::fromArray($replyMarkup);
                }

                return null;
            })($data['reply_markup'] ?? null);
            $object->input_message_content = (function (array|null $inputMessageContent)
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