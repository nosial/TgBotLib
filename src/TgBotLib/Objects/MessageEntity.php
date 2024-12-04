<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\MessageEntityType;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageEntity implements ObjectTypeInterface
    {
        private ?MessageEntityType $type;
        private int $offset;
        private int $length;
        private ?string $url;
        private ?User $user;
        private ?string $language;
        private ?string $custom_emoji_id;

        /**
         * Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag), “cashtag” ($USD),
         * “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org),
         * “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text),
         * “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre”
         * (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames),
         * “custom_emoji” (for inline custom emoji stickers)
         *
         * @return ?MessageEntityType
         */
        public function getType(): ?MessageEntityType
        {
            return $this->type;
        }

        /**
         * Sets the type of the entity
         *
         * @param ?MessageEntityType $type
         * @return MessageEntity
         */
        public function setType(?MessageEntityType $type): MessageEntity
        {
            $this->type = $type;
            return $this;
        }

        /**
         * Offset in UTF-16 code units to the start of the entity
         *
         * @see https://telegram.org/blog/edit#new-mentions
         * @return int
         */
        public function getOffset(): int
        {
            return $this->offset;
        }

        /**
         * Sets the offset of the entity
         *
         * @param int $offset
         * @return MessageEntity
         */
        public function setOffset(int $offset): MessageEntity
        {
            $this->offset = $offset;
            return $this;
        }

        /**
         * Offset in UTF-16 code units to the start of the entity
         *
         * @see https://core.telegram.org/api/entities#entity-length
         * @return int
         */
        public function getLength(): int
        {
            return $this->length;
        }

        /**
         * Sets the length of the entity
         *
         * @param int $length
         * @return MessageEntity
         */
        public function setLength(int $length): MessageEntity
        {
            $this->length = $length;
            return $this;
        }

        /**
         * Optional. For “text_link” only, URL that will be opened after user taps on the text
         *
         * @return string|null
         */
        public function getUrl(): ?string
        {
            return $this->url;
        }

        /**
         * Sets the URL that will be opened after user taps on the text
         *
         * @param string|null $url
         * @return MessageEntity
         */
        public function setUrl(?string $url): MessageEntity
        {
            $this->url = $url;
            return $this;
        }

        /**
         * Optional. For “text_mention” only, the mentioned user
         *
         * @return User|null
         */
        public function getUser(): ?User
        {
            return $this->user;
        }

        /**
         * Sets the mentioned user
         *
         * @param User|null $user
         * @return MessageEntity
         */
        public function setUser(?User $user): MessageEntity
        {
            $this->user = $user;
            return $this;
        }

        /**
         * Optional. For “pre” only, the programming language of the entity text
         *
         * @return string|null
         */
        public function getLanguage(): ?string
        {
            return $this->language;
        }

        /**
         * Sets the language of the entity text
         *
         * @param string|null $language
         * @return MessageEntity
         */
        public function setLanguage(?string $language): MessageEntity
        {
            $this->language = $language;
            return $this;
        }

        /**
         * Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get
         * full information about the sticker
         *
         * @see https://core.telegram.org/bots/api#getcustomemojistickers
         * @return string|null
         */
        public function getCustomEmojiId(): ?string
        {
            return $this->custom_emoji_id;
        }

        /**
         * Set the custom emoji id
         *
         * @param string|null $custom_emoji_id
         * @return MessageEntity
         */
        public function setCustomEmojiId(?string $custom_emoji_id): MessageEntity
        {
            $this->custom_emoji_id = $custom_emoji_id;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            $array = [
                'type' => $this->type->value,
                'offset' => $this->offset,
                'length' => $this->length
            ];

            if($this->url !== null)
            {
                $array['url'] = $this->url;
            }

            if($this->user !== null)
            {
                $array['user'] = $this->user->toArray();
            }

            if($this->language !== null)
            {
                $array['language'] = $this->language;
            }

            if($this->custom_emoji_id !== null)
            {
                $array['custom_emoji_id'] = $this->custom_emoji_id;
            }

            return $array;
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MessageEntity
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = is_null($data['type']) ? null : MessageEntityType::tryFrom($data['type']);
            $object->offset = $data['offset'] ?? null;
            $object->length = $data['length'] ?? null;
            $object->url = $data['url'] ?? null;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->language = $data['language'] ?? null;
            $object->custom_emoji_id = $data['custom_emoji_id'] ?? null;

            return $object;
        }
    }