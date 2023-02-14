<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageEntity implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var int
         */
        private $offset;

        /**
         * @var int
         */
        private $length;

        /**
         * @var string|null
         */
        private $url;

        /**
         * @var User|null
         */
        private $user;

        /**
         * @var string|null
         */
        private $language;

        /**
         * @var string|null
         */
        private $custom_emoji_id;

        /**
         * Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag), “cashtag” ($USD),
         * “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org),
         * “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text),
         * “strikethrough” (strikethrough text), “spoiler” (spoiler message), “code” (monowidth string), “pre”
         * (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames),
         * “custom_emoji” (for inline custom emoji stickers)
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
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
         * Optional. For “text_link” only, URL that will be opened after user taps on the text
         *
         * @return string|null
         */
        public function getUrl(): ?string
        {
            return $this->url;
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
         * Optional. For “pre” only, the programming language of the entity text
         *
         * @return string|null
         */
        public function getLanguage(): ?string
        {
            return $this->language;
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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'offset' => $this->offset,
                'length' => $this->length,
                'url' => $this->url,
                'user' => ($this->user instanceof ObjectTypeInterface) ? $this->user->toArray() : null,
                'language' => $this->language,
                'custom_emoji_id' => $this->custom_emoji_id
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
            $object->offset = $data['offset'] ?? null;
            $object->length = $data['length'] ?? null;
            $object->url = $data['url'] ?? null;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->language = $data['language'] ?? null;
            $object->custom_emoji_id = $data['custom_emoji_id'] ?? null;

            return $object;
        }
    }