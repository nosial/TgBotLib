<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatMemberUpdated implements ObjectTypeInterface
    {
        private Chat $chat;
        private User $from;
        private int $date;
        private ChatMember $old_chat_member;
        private ChatMember $new_chat_member;
        private ?ChatInviteLink $invite_link;
        private bool $via_chat_folder_invite_link;

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
         * Optional. True, if the user joined the chat via a chat folder invite link
         *
         * @return bool
         */
        public function isViaChatFolderInviteLink(): bool
        {
            return $this->via_chat_folder_invite_link;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'chat' => $this->chat->toArray(),
                'from' => $this->from->toArray(),
                'date' => $this->date,
                'old_chat_member' => $this->old_chat_member->toArray(),
                'new_chat_member' => $this->new_chat_member->toArray(),
                'invite_link' => $this->invite_link?->toArray(),
                'via_chat_folder_invite_link' => $this->via_chat_folder_invite_link,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatMemberUpdated
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : new Chat();
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : new User();
            $object->date = $data['date'] ?? 0;
            $object->old_chat_member = isset($data['old_chat_member']) ? ChatMember::fromArray($data['old_chat_member']) : null;
            $object->new_chat_member = isset($data['new_chat_member']) ? ChatMember::fromArray($data['new_chat_member']) : null;
            $object->invite_link = isset($data['invite_link']) ? ChatInviteLink::fromArray($data['invite_link']) : null;
            $object->via_chat_folder_invite_link = $data['via_chat_folder_invite_link'] ?? false;

            return $object;
        }
    }