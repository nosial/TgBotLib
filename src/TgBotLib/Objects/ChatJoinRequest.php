<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatJoinRequest implements ObjectTypeInterface
    {
        private Chat $chat;
        private User $from;
        private int $user_chat_id;
        private int $date;
        private ?string $bio;
        private ?ChatInviteLink $invite_link;

        /**
         * Chat to which the request was sent
         *
         * @return Chat
         */
        public function getChat(): Chat
        {
            return $this->chat;
        }

        /**
         * User that sent the join request
         *
         * @return User
         */
        public function getFrom(): User
        {
            return $this->from;
        }

        /**
         * Identifier of a private chat with the user who sent the join request. This number may have more than 32
         * significant bits and some programming languages may have difficulty/silent defects in interpreting it.
         * But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for
         * storing this identifier. The bot can use this identifier for 24 hours to send messages until the join
         * request is processed, assuming no other administrator contacted the user.
         *
         * @return int
         */
        public function getUserChatId(): int
        {
            return $this->user_chat_id;
        }

        /**
         * Date the request was sent in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * Optional. Bio of the user.
         *
         * @return string|null
         */
        public function getBio(): ?string
        {
            return $this->bio;
        }

        /**
         * Optional. Chat invite link that was used by the user to send the join request
         *
         * @return ChatInviteLink|null
         */
        public function getInviteLink(): ?ChatInviteLink
        {
            return $this->invite_link;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'chat' => $this->chat?->toArray(),
                'from' => $this->from?->toArray(),
                'user_chat_id' => $this->user_chat_id,
                'date' => $this->date,
                'bio' => $this->bio,
                'invite_link' => $this->invite_link?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatJoinRequest
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->user_chat_id = $data['user_chat_id'];
            $object->date = $data['date'];
            $object->bio = $data['bio'] ?? null;
            $object->invite_link = isset($data['invite_link']) ? ChatInviteLink::fromArray($data['invite_link']) : null;

            return $object;
        }
    }