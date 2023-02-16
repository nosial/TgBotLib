<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatMemberUpdated implements ObjectTypeInterface
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
        private $date;

        /**
         * @var ChatMember
         */
        private $old_chat_member;

        /**
         * @var ChatMember
         */
        private $new_chat_member;

        /**
         * @var ChatInviteLink|null
         */
        private $invite_link;

        /**
         * Chat the user belongs to
         *
         * @return Chat
         */
        public function getChat(): Chat
        {
            return $this->chat;
        }

        /**
         * Performer of the action, which resulted in the change
         *
         * @return User
         */
        public function getFrom(): User
        {
            return $this->from;
        }

        /**
         * Date the change was done in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * Previous information about the chat member
         *
         * @return ChatMember
         */
        public function getOldChatMember(): ChatMember
        {
            return $this->old_chat_member;
        }

        /**
         * New information about the chat member
         *
         * @return ChatMember
         */
        public function getNewChatMember(): ChatMember
        {
            return $this->new_chat_member;
        }

        /**
         * Optional. Chat invite link, which was used by the user to join the chat; for joining by invite
         * link events only.
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
                'date' => $this->date,
                'old_chat_member' => ($this->old_chat_member instanceof ObjectTypeInterface) ? $this->old_chat_member->toArray() : $this->old_chat_member,
                'new_chat_member' => ($this->new_chat_member instanceof ObjectTypeInterface) ? $this->new_chat_member->toArray() : $this->new_chat_member,
                'invite_link' => ($this->invite_link instanceof ObjectTypeInterface) ? $this->invite_link->toArray() : $this->invite_link,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ChatMemberUpdated
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : new Chat();
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : new User();
            $object->date = $data['date'] ?? 0;
            $object->old_chat_member = isset($data['old_chat_member']) ? ChatMember::fromArray($data['old_chat_member']) : new ChatMember();
            $object->new_chat_member = isset($data['new_chat_member']) ? ChatMember::fromArray($data['new_chat_member']) : new ChatMember();
            $object->invite_link = isset($data['invite_link']) ? ChatInviteLink::fromArray($data['invite_link']) : null;

            return $object;
        }
    }