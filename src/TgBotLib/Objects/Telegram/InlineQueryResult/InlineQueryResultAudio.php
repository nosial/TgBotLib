<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputContactMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputInvoiceMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputLocationMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputTextMessageContent;
    use TgBotLib\Objects\Telegram\InputMessageContent\InputVenueMessageContent;
    use TgBotLib\Objects\Telegram\MessageEntity;

    class InlineQueryResultAudio implements ObjectTypeInterface
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
        private $audio_url;

        /**
         * @var string
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
         * @var string|null
         */
        private $performer;

        /**
         * @var int|null
         */
        private $audio_duration;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        private $input_message_content;

        /**
         * InlineQueryResultAudio constructor.
         */
        public function __construct()
        {
            $this->type = 'audio';
        }

        /**
         * Type of the result, must be audio
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
         * Sets the value of 'id' property
         * Unique identifier for this result, 1-64 bytes
         *
         * @param string $id
         * @return $this
         */
        public function setId(string $id): InlineQueryResultAudio
        {
            if(!Validate::length($id, 1, 64))
            {
                throw new InvalidArgumentException(sprintf('id must be between 1 and 64 characters long, got %s characters', $id));
            }

            $this->id = $id;
            return $this;
        }

        /**
         * A valid URL for the audio file
         *
         * @return string
         */
        public function getAudioUrl(): string
        {
            return $this->audio_url;
        }

        /**
         * Sets the value of 'audio_url' property
         * A valid URL for the audio file
         *
         * @param string $audio_url
         * @return $this
         */
        public function setAudioUrl(string $audio_url): InlineQueryResultAudio
        {
            if(!Validate::url($audio_url))
                throw new InvalidArgumentException(sprintf('audio_url is not a valid URL: %s', $audio_url));

            $this->audio_url = $audio_url;
            return $this;
        }

        /**
         * Title
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Sets the value of 'title' property
         * Title
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultAudio
        {
            $this->title = $title;
            return $this;
        }

        /**
         * Optional. Caption, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Sets the value of 'caption' property
         * Optional. Caption, 0-1024 characters after entities parsing
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InlineQueryResultAudio
        {
            if($caption == null)
            {
                $this->caption = null;
                return $this;
            }

            if(!Validate::length($caption, 0, 1024))
                throw new InvalidArgumentException(sprintf('caption must be between 0 and 1024 characters long, got %s characters', $caption));

            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the audio caption. See formatting options for more details.
         *
         * @return string|null
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Sets the value of 'parse_mode' property
         * Optional. Mode for parsing entities in the audio caption. See formatting options for more details.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultAudio
        {
            if($parse_mode == null)
            {
                $this->parse_mode = null;
                return $this;
            }

            if(!in_array(strtolower($parse_mode), ['markdown', 'html']))
                throw new InvalidArgumentException(sprintf('parse_mode must be one of Markdown, HTML, got %s', $parse_mode));

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
         * Sets the value of 'caption_entities' property
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @param MessageEntity[]|null $caption_entities
         * @return $this
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultAudio
        {
            if($caption_entities == null)
            {
                $this->caption_entities = null;
                return $this;
            }

            $this->caption_entities = [];

            foreach($caption_entities as $entity)
            {
                if(!$entity instanceof MessageEntity)
                    throw new InvalidArgumentException(sprintf('caption_entities must be array of MessageEntity, got %s', gettype($entity)));

                $this->caption_entities[] = $entity;
            }

            return $this;
        }

        /**
         * Optional. Performer
         *
         * @return string|null
         */
        public function getPerformer(): ?string
        {
            return $this->performer;
        }

        /**
         * Sets the value of 'performer' property
         * Optional. Performer
         *
         * @param string|null $performer
         * @return $this
         */
        public function setPerformer(?string $performer): InlineQueryResultAudio
        {
            if($performer == null)
            {
                $this->performer = null;
                return $this;
            }

            $this->performer = $performer;
            return $this;
        }

        /**
         * Optional. Audio duration in seconds
         *
         * @return int|null
         */
        public function getAudioDuration(): ?int
        {
            return $this->audio_duration;
        }

        /**
         * Sets the value of 'audio_duration' property
         * Optional. Audio duration in seconds
         *
         * @param int|null $audio_duration
         * @return $this
         */
        public function setAudioDuration(?int $audio_duration): InlineQueryResultAudio
        {
            if($audio_duration == null)
            {
                $this->audio_duration = null;
                return $this;
            }

            $this->audio_duration = $audio_duration;
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
         * Sets the value of 'reply_markup' property
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultAudio
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the audio
         *
         * @return InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null
         */
        public function getInputMessageContent(): InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of 'input_message_content' property
         * Optional. Content of the message to be sent instead of the audio
         *
         * @param InputContactMessageContent|InputInvoiceMessageContent|InputLocationMessageContent|InputTextMessageContent|InputVenueMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(InputVenueMessageContent|InputTextMessageContent|InputContactMessageContent|InputLocationMessageContent|InputInvoiceMessageContent|null $input_message_content): InlineQueryResultAudio
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
                'type' => $this->type,
                'id' => $this->id,
                'audio_url' => $this->audio_url,
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => ($this->caption_entities) ? array_map(function (MessageEntity $messageEntity) {
                    return $messageEntity->toArray();
                }, $this->caption_entities) : null,
                'performer' => $this->performer,
                'audio_duration' => $this->audio_duration,
                'reply_markup' => ($this->reply_markup) ? $this->reply_markup->toArray() : null,
                'input_message_content' => $this->input_message_content,
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
            $object->audio_url = $data['audio_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = ($data['caption_entities']) ? array_map(function (array $messageEntity) {
                return MessageEntity::fromArray($messageEntity);
            }, $data['caption_entities']) : null;
            $object->performer = $data['performer'] ?? null;
            $object->audio_duration = $data['audio_duration'] ?? null;
            $object->reply_markup = ($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = $data['input_message_content'] ?? null;

            return $object;
        }
    }