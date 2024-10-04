<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineKeyboardMarkup;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultVoice extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $voice_url;
        private string $title;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?int $voice_duration;
        private ?InlineKeyboardMarkup $reply_markup;
        private $input_message_content;

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
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the input_message_content of the result.
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultVoice
        {
            $this->input_message_content = $input_message_content;
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
                'voice_url' => $this->voice_url,
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => is_null($this->caption_entities) ? null : array_map(fn(MessageEntity $item) => $item->toArray(), $this->caption_entities),
                'voice_duration' => $this->voice_duration,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
                'input_message_content' => ($this->input_message_content instanceof ObjectTypeInterface) ? $this->input_message_content->toArray() : null,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultVoice
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::VOICE;
            $object->id = $data['id'] ?? null;
            $object->voice_url = $data['voice_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = array_map(fn(array $items) => MessageEntity::fromArray($items), $data['caption_entities']);
            $object->voice_duration = $data['voice_duration'] ?? null;
            $object->reply_markup = InlineKeyboardMarkup::fromArray($data['reply_markup'] ?? []);
            $object->input_message_content = InputMessageContent::fromArray($data['input_message_content'] ?? []);

            return $object;
        }
    }