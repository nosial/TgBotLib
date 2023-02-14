<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatJoinRequest implements ObjectTypeInterface
    {
        /**
         * @var Chat
         */
        private $chat;

        /**
         * @var User
         */
        private $from;

        /**
         * @var int
         */
        private $user_chat_id;

        /**
         * @var int
         */
        private $date;

        /**
         * @var string|null
         */
        private $bio;

        /**
         * @var ChatInviteLink|null
         */
        private $invite_link;

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'chat' => ($this->chat instanceof ObjectTypeInterface) ? $this->chat->toArray() : $this->chat,
                'from' => ($this->from instanceof ObjectTypeInterface) ? $this->from->toArray() : $this->from,
                'user_chat_id' => $this->user_chat_id,
                'date' => $this->date,
                'bio' => $this->bio,
                'invite_link' => ($this->invite_link instanceof ObjectTypeInterface) ? $this->invite_link->toArray() : $this->invite_link,
            ];
        }

        /**
         * Constructs ChatJoinRequest object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->chat = (isset($data['chat'])) ? Chat::fromArray($data['chat']) : null;
            $object->from = (isset($data['from'])) ? User::fromArray($data['from']) : null;
            $object->user_chat_id = (isset($data['user_chat_id'])) ? $data['user_chat_id'] : null;
            $object->date = (isset($data['date'])) ? $data['date'] : null;
            $object->bio = (isset($data['bio'])) ? $data['bio'] : null;
            $object->invite_link = (isset($data['invite_link'])) ? ChatInviteLink::fromArray($data['invite_link']) : null;

            return $object;
        }
    }