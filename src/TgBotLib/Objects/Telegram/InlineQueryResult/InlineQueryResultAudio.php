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
         * A valid URL for the audio file
         *
         * @return string
         */
        public function getAudioUrl(): string
        {
            return $this->audio_url;
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
         * Optional. Caption, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
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
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
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
         * Optional. Audio duration in seconds
         *
         * @return int|null
         */
        public function getAudioDuration(): ?int
        {
            return $this->audio_duration;
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
         * Optional. Content of the message to be sent instead of the audio
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