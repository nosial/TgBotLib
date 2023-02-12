<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    class User
    {
        /**
         * @var int
         */
        private $id;

        /**
         * @var bool
         */
        private $is_bot;

        /**
         * @var string
         */
        private $first_name;

        /**
         * @var string|null
         */
        private $last_name;

        /**
         * @var string|null
         */
        private $username;

        /**
         * @var string|null
         */
        private $language_code;

        /**
         * @var bool
         */
        private $is_premium;

        /**
         * @var bool
         */
        private $added_to_attachment_menu;

        /**
         * @var bool
         */
        private $can_join_groups;

        /**
         * @var bool
         */
        private $can_read_all_group_messages;

        /**
         * @var bool
         */
        private $supports_inline_queries;

        /**
         * Unique identifier for this user or bot. This number may have more than 32 significant bits and some
         * programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
         * significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
         *
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * True, if this user is a bot
         *
         * @return bool
         */
        public function isIsBot(): bool
        {
            return $this->is_bot;
        }

        /**
         * User's or bot's first name
         *
         * @return string
         */
        public function getFirstName(): string
        {
            return $this->first_name;
        }

        /**
         * Optional. User's or bot's last name
         *
         * @return string|null
         */
        public function getLastName(): ?string
        {
            return $this->last_name;
        }

        /**
         * Optional. User's or bot's username
         *
         * @return string|null
         */
        public function getUsername(): ?string
        {
            return $this->username;
        }

        /**
         * Optional. IETF language tag of the user's language
         *
         * @see https://en.wikipedia.org/wiki/IETF_language_tag
         * @return string|null
         */
        public function getLanguageCode(): ?string
        {
            return $this->language_code;
        }

        /**
         * Optional. True, if this user is a Telegram Premium user
         *
         * @return bool
         */
        public function isIsPremium(): bool
        {
            return $this->is_premium;
        }

        /**
         * Optional. True, if this user added the bot to the attachment menu
         *
         * @return bool
         */
        public function isAddedToAttachmentMenu(): bool
        {
            return $this->added_to_attachment_menu;
        }

        /**
         * Optional. True, if the bot can be invited to groups. Returned only in getMe.
         *
         * @see https://core.telegram.org/bots/api#getme
         * @return bool
         */
        public function isCanJoinGroups(): bool
        {
            return $this->can_join_groups;
        }

        /**
         * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
         *
         * @see https://core.telegram.org/bots/api#getme
         * @see https://core.telegram.org/bots#privacy-mode
         * @return bool
         */
        public function isCanReadAllGroupMessages(): bool
        {
            return $this->can_read_all_group_messages;
        }

        /**
         * Optional. True, if the bot supports inline queries. Returned only in getMe.
         *
         * @return bool
         */
        public function isSupportsInlineQueries(): bool
        {
            return $this->supports_inline_queries;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'is_bot' => $this->is_bot,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'username' => $this->username,
                'language_code' => $this->language_code,
                'is_premium' => $this->is_premium,
                'added_to_attachment_menu' => $this->added_to_attachment_menu,
                'can_join_groups' => $this->can_join_groups,
                'can_read_all_group_messages' => $this->can_read_all_group_messages,
                'supports_inline_queries' => $this->supports_inline_queries,
            ];
        }

        /**
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return static
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->id = @$data['id'];
            $object->is_bot = @$data['is_bot'];
            $object->first_name = @$data['first_name'];
            $object->last_name = @$data['last_name'] ?? null;
            $object->username = @$data['username'] ?? null;
            $object->language_code = @$data['language_code'] ?? null;
            $object->is_premium = @$data['is_premium'] ?? false;
            $object->added_to_attachment_menu = @$data['added_to_attachment_menu'] ?? false;
            $object->can_join_groups = @$data['can_join_groups'] ?? false;
            $object->can_read_all_group_messages = @$data['can_read_all_group_messages'] ?? false;
            $object->supports_inline_queries = @$data['supports_inline_queries'] ?? false;

            return $object;
        }
    }