<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BusinessConnection implements ObjectTypeInterface
    {
        private string $id;
        private User $user;
        private int $user_chat_id;
        private int $date;
        private bool $can_reply;
        private bool $is_enabled;

        /**
         * Unique identifier of the business connection
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Business account user that created the business connection
         *
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * Identifier of a private chat with the user who created the business connection. This number may have more
         * than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting
         * it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe
         * for storing this identifier.
         *
         * @return int
         */
        public function getUserChatId(): int
        {
            return $this->user_chat_id;
        }

        /**
         * Date the connection was established in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours
         *
         * @return bool
         */
        public function getCanReply(): bool
        {
            return $this->can_reply;
        }

        /**
         * True, if the connection is active
         *
         * @return bool
         */
        public function getIsEnabled(): bool
        {
            return $this->is_enabled;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'id' => $this->id,
                'user' => $this->user->toArray(),
                'user_chat_id' => $this->user_chat_id,
                'date' => $this->date,
                'can_reply' => $this->can_reply,
                'is_enabled' => $this->is_enabled,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BusinessConnection
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->id = $data['id'];
            $object->user = User::fromArray($data['user']);
            $object->user_chat_id = $data['user_chat_id'];
            $object->date = $data['date'];
            $object->can_reply = $data['can_reply'] ?? false;
            $object->is_enabled = $data['is_enabled'] ?? false;

            return $object;
        }
    }