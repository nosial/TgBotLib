<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\InlineQueryResult;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineKeyboardMarkup;
    use TgBotLib\Objects\Telegram\InputMessageContent;
    use TgBotLib\Objects\Telegram\MessageEntity;

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
         * @var InputMessageContent|null
         */
        private $input_message_content;

        /**
         * Type of the result, must be voice
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
         * A valid URL for the voice recording
         *
         * @return string
         */
        public function getVoiceUrl(): string
        {
            return $this->voice_url;
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
         * Optional. Caption, 0-1024 characters after entities parsing
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
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
         * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode
         *
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
        }

        /**
         * Optional. Recording duration in seconds
         *
         * @return int|null
         */
        public function getVoiceDuration(): ?int
        {
            return $this->voice_duration;
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
         * Optional. Content of the message to be sent instead of the voice recording
         *
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         * @throws \TgBotLib\Exceptions\NotImplementedException
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
                'caption_entities' => (function (array $data) {
                    $result = [];
                    foreach ($data as $item) {
                        $result[] = $item->toArray();
                    }
                    return $result;
                })($this->caption_entities ?? null),
                'voice_duration' => $this->voice_duration,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
                'input_message_content' => ($this->input_message_content instanceof InputMessageContent) ? $this->input_message_content->toArray() : null,
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
            $object->voice_url = $data['voice_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = (function (array $data) {
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