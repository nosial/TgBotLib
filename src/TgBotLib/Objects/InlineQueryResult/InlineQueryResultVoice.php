<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\InputMessageContent;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultVoice implements ObjectTypeInterface
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
        private $voice_url;

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
         * @var int|null
         */
        private $voice_duration;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * @var \TgBotLib\Objects\InputMessageContent\InputContactMessageContent|\TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent|\TgBotLib\Objects\InputMessageContent\InputLocationMessageContent|\TgBotLib\Objects\InputMessageContent\InputTextMessageContent|\TgBotLib\Objects\InputMessageContent\InputVenueMessageContent|null
         */
        private $input_message_content;

        /**
         * InlineQueryResultVoice constructor.
         */
        public function __construct()
        {
            $this->type = 'voice';
        }

        /**
         * The Type of the result must be voice
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
         * Sets the id of the result.
         *
         * @param string $id
         * @return $this
         */
        public function setId(string $id): InlineQueryResultVoice
        {
            if(strlen($id) > 64)
            {
                throw new InvalidArgumentException('id must be between 1 and 64 characters');
            }

            $this->id = $id;
            return $this;
        }

        /**
         * A valid URL for the voice recording
         *
         * @return string
         * @noinspection PhpUnused
         */
        public function getVoiceUrl(): string
        {
            return $this->voice_url;
        }

        /**
         * Sets the voice_url of the result.
         *
         * @param string $voice_url
         * @return $this
         */
        public function setVoiceUrl(string $voice_url): InlineQueryResultVoice
        {
            if(!filter_var($voice_url, FILTER_VALIDATE_URL))
            {
                throw new InvalidArgumentException('voice_url must be a valid URL');
            }

            $this->voice_url = $voice_url;
            return $this;
        }

        /**
         * Recording title
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Sets the title of the result.
         *
         * @param string $title
         * @return $this
         */
        public function setTitle(string $title): InlineQueryResultVoice
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
         * Sets the caption of the result.
         *
         * @param string|null $caption
         * @return $this
         */
        public function setCaption(?string $caption): InlineQueryResultVoice
        {
            $this->caption = $caption;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the voice message caption. See formatting options for more details.
         *
         * @return string|null
         */
        public function getParseMode(): ?string
        {
            return $this->parse_mode;
        }

        /**
         * Sets the parse_mode of the result.
         *
         * @param string|null $parse_mode
         * @return $this
         */
        public function setParseMode(?string $parse_mode): InlineQueryResultVoice
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
         * Sets the caption_entities of the result.
         *
         * @param array|null $caption_entities
         * @return $this
         */
        public function setCaptionEntities(?array $caption_entities): InlineQueryResultVoice
        {
            $this->caption_entities = $caption_entities;
            return $this;
        }

        /**
         * Optional. Recording duration in seconds
         *
         * @return int|null
         * @noinspection PhpUnused
         */
        public function getVoiceDuration(): ?int
        {
            return $this->voice_duration;
        }

        /**
         * Sets the voice_duration of the result.
         *
         * @param int|null $voice_duration
         * @return $this
         */
        public function setVoiceDuration(?int $voice_duration): InlineQueryResultVoice
        {
            $this->voice_duration = $voice_duration;
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
         * Sets the reply_markup of the result.
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return $this
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultVoice
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * Optional. Content of the message to be sent instead of the voice recording
         *
         * @return \TgBotLib\Objects\InputMessageContent\InputContactMessageContent|\TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent|\TgBotLib\Objects\InputMessageContent\InputLocationMessageContent|\TgBotLib\Objects\InputMessageContent\InputTextMessageContent|\TgBotLib\Objects\InputMessageContent\InputVenueMessageContent|null
         */
        public function getInputMessageContent(): \TgBotLib\Objects\InputMessageContent\InputContactMessageContent|\TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent|\TgBotLib\Objects\InputMessageContent\InputLocationMessageContent|\TgBotLib\Objects\InputMessageContent\InputTextMessageContent|\TgBotLib\Objects\InputMessageContent\InputVenueMessageContent|null
        {
            return $this->input_message_content;
        }

        /**
         * Sets the input_message_content of the result.
         *
         * @param \TgBotLib\Objects\InputMessageContent\InputContactMessageContent|\TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent|\TgBotLib\Objects\InputMessageContent\InputLocationMessageContent|\TgBotLib\Objects\InputMessageContent\InputTextMessageContent|\TgBotLib\Objects\InputMessageContent\InputVenueMessageContent $input_message_content
         * @return $this
         */
        public function setInputMessageContent(\TgBotLib\Objects\InputMessageContent\InputContactMessageContent|\TgBotLib\Objects\InputMessageContent\InputInvoiceMessageContent|\TgBotLib\Objects\InputMessageContent\InputLocationMessageContent|\TgBotLib\Objects\InputMessageContent\InputTextMessageContent|\TgBotLib\Objects\InputMessageContent\InputVenueMessageContent $input_message_content): InlineQueryResultVoice
        {
            $this->input_message_content = $input_message_content;
            return $this;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'id' => $this->id,
                'voice_url' => $this->voice_url,
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => (static function (array $data) {
                    $result = [];
                    foreach ($data as $item) {
                        $result[] = $item->toArray();
                    }
                    return $result;
                })($this->caption_entities ?? null),
                'voice_duration' => $this->voice_duration,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
                'input_message_content' => ($this->input_message_content instanceof ObjectTypeInterface) ? $this->input_message_content->toArray() : null,
            ];
        }

        /**
         * Constructs object from an array representation
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
            $object->voice_url = $data['voice_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = (static function (array $data) {
                $result = [];
                foreach ($data as $item)
                {
                    $result[] = MessageEntity::fromArray($item);
                }
                return $result;
            })($data['caption_entities'] ?? []);
            $object->voice_duration = $data['voice_duration'] ?? null;
            $object->reply_markup = InlineKeyboardMarkup::fromArray($data['reply_markup'] ?? []);
            $object->input_message_content = InputMessageContent::fromArray($data['input_message_content'] ?? []);

            return $object;
        }
    }