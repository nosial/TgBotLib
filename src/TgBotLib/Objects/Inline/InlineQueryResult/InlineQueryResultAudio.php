<?php

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\InputMessageContent;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\MessageEntity;

    class InlineQueryResultAudio extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $audio_url;
        private string $title;
        private ?string $caption;
        private ?string $parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private ?string $performer;
        private ?int $audio_duration;
        private ?InlineKeyboardMarkup $reply_markup;
        private ?InputMessageContent $input_message_content;

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
            {
                throw new InvalidArgumentException(sprintf('audio_url is not a valid URL: %s', $audio_url));
            }

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
            if($caption === null)
            {
                $this->caption = null;
                return $this;
            }

            if(!Validate::length($caption, 0, 1024))
            {
                throw new InvalidArgumentException(sprintf('caption must be between 0 and 1024 characters long, got %s characters', $caption));
            }

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
            if($parse_mode === null)
            {
                $this->parse_mode = null;
                return $this;
            }

            if(!in_array(strtolower($parse_mode), ['markdown', 'html']))
            {
                throw new InvalidArgumentException(sprintf('parse_mode must be one of Markdown, HTML, got %s', $parse_mode));
            }

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
            if($performer === null)
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
            if($audio_duration === null)
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
         * @return InputMessageContent|null
         */
        public function getInputMessageContent(): ?InputMessageContent
        {
            return $this->input_message_content;
        }

        /**
         * Sets the value of 'input_message_content' property
         * Optional. Content of the message to be sent instead of the audio
         *
         * @param InputMessageContent|null $input_message_content
         * @return $this
         */
        public function setInputMessageContent(?InputMessageContent $input_message_content): InlineQueryResultAudio
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
                'audio_url' => $this->audio_url,
                'title' => $this->title,
                'caption' => $this->caption,
                'parse_mode' => $this->parse_mode,
                'caption_entities' => array_map(fn(MessageEntity $messageEntity) => $messageEntity->toArray(), $this->caption_entities),
                'performer' => $this->performer,
                'audio_duration' => $this->audio_duration,
                'reply_markup' => ($this->reply_markup) ? $this->reply_markup->toArray() : null,
                'input_message_content' => $this->input_message_content,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultAudio
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = InlineQueryResultType::AUDIO;
            $object->id = $data['id'] ?? null;
            $object->audio_url = $data['audio_url'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->caption = $data['caption'] ?? null;
            $object->parse_mode = $data['parse_mode'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn(array $messageEntity) => MessageEntity::fromArray($messageEntity), $data['caption_entities']) : null;
            $object->performer = $data['performer'] ?? null;
            $object->audio_duration = $data['audio_duration'] ?? null;
            $object->reply_markup = ($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;
            $object->input_message_content = $data['input_message_content'] ?? null;

            return $object;
        }
    }