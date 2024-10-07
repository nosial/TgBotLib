<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\ChatType;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Chat implements ObjectTypeInterface
    {
        private int $id;
        private ?ChatType $type;
        private ?string $title;
        private ?string $username;
        private ?string $first_name;
        private ?string $last_name;
        private bool $is_forum;

        /**
         * Unique identifier for this chat. This number may have more than 32 significant bits and some programming
         * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits,
         * so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
         *
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
         *
         * @return ChatType
         * @see ChatType
         */
        public function getType(): ChatType
        {
            return $this->type;
        }

        /**
         * Optional. Title, for supergroups, channels and group chats
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
        }

        /**
         * Optional. Username, for private chats, supergroups and channels if available
         *
         * @return string|null
         */
        public function getUsername(): ?string
        {
            return $this->username;
        }

        /**
         * Optional. First name of the other party in a private chat
         *
         * @return string|null
         */
        public function getFirstName(): ?string
        {
            return $this->first_name;
        }

        /**
         * Optional. Last name of the other party in a private chat
         *
         * @return string|null
         */
        public function getLastName(): ?string
        {
            return $this->last_name;
        }

        /**
         * Optional. True, if the supergroup chat is a forum (has topics enabled)
         *
         * @see https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups
         * @return bool
         */
        public function isForum(): bool
        {
            return $this->is_forum;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'type' => $this->type->value,
                'title' => $this->title,
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'is_forum' => $this->is_forum
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Chat
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->id = $data['id'] ?? null;
            $object->type = ChatType::tryFrom($data['type']) ?? null;
            $object->title = $data['title'] ?? null;
            $object->username = $data['username'] ?? null;
            $object->first_name = $data['first_name'] ?? null;
            $object->last_name = $data['last_name'] ?? null;
            $object->is_forum = $data['is_forum'] ?? false;

            return $object;
        }
    }