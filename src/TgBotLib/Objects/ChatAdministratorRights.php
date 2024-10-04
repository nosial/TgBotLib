<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatAdministratorRights implements ObjectTypeInterface
    {
        /**
         * @var bool
         */
        private $is_anonymous;

        /**
         * @var bool
         */
        private $can_manage_chat;

        /**
         * @var bool
         */
        private $can_delete_messages;

        /**
         * @var bool
         */
        private $can_manage_video_chats;

        /**
         * @var bool
         */
        private $can_restrict_members;

        /**
         * @var bool
         */
        private $can_promote_members;

        /**
         * @var bool
         */
        private $can_change_info;

        /**
         * @var bool
         */
        private $can_invite_users;

        /**
         * @var bool
         */
        private $can_post_messages;

        /**
         * @var bool
         */
        private $can_edit_messages;

        /**
         * @var bool
         */
        private $can_pin_messages;

        /**
         * @var bool
         */
        private $can_manage_topics;

        /**
         * True, if the user's presence in the chat is hidden
         *
         * @return bool
         */
        public function isAnonymous(): bool
        {
            return $this->is_anonymous;
        }

        /**
         * True, if the administrator can access the chat event log, chat statistics, message statistics in channels,
         * see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other
         * administrator privilege
         *
         * @return bool
         */
        public function canManageChat(): bool
        {
            return $this->can_manage_chat;
        }

        /**
         * True, if the administrator can delete messages of other users
         *
         * @return bool
         */
        public function canDeleteMessages(): bool
        {
            return $this->can_delete_messages;
        }

        /**
         * True, if the administrator can manage video chats
         *
         * @return bool
         */
        public function canManageVideoChats(): bool
        {
            return $this->can_manage_video_chats;
        }

        /**
         * True, if the administrator can restrict, ban or unban chat members
         *
         * @return bool
         */
        public function canRestrictMembers(): bool
        {
            return $this->can_restrict_members;
        }

        /**
         * True, if the administrator can add new administrators with a subset of their own privileges or demote
         * administrators that they have promoted, directly or indirectly (promoted by administrators that were
         * appointed by the user)
         *
         * @return bool
         */
        public function canPromoteMembers(): bool
        {
            return $this->can_promote_members;
        }

        /**
         * True, if the user is allowed to change the chat title, photo and other settings
         *
         * @return bool
         */
        public function canChangeInfo(): bool
        {
            return $this->can_change_info;
        }

        /**
         * True, if the user is allowed to invite new users to the chat
         *
         * @return bool
         */
        public function canInviteUsers(): bool
        {
            return $this->can_invite_users;
        }

        /**
         * Optional. True, if the administrator can post in the channel; channels only
         *
         * @return bool
         */
        public function canPostMessages(): bool
        {
            return $this->can_post_messages;
        }

        /**
         * Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
         *
         * @return bool
         */
        public function canEditMessages(): bool
        {
            return $this->can_edit_messages;
        }

        /**
         * Optional. True, if the user is allowed to pin messages; groups and supergroups only
         *
         * @return bool
         */
        public function canPinMessages(): bool
        {
            return $this->can_pin_messages;
        }

        /**
         * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
         *
         * @return bool
         */
        public function canManageTopics(): bool
        {
            return $this->can_manage_topics;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'is_anonymous' => $this->is_anonymous,
                'can_manage_chat' => $this->can_manage_chat,
                'can_delete_messages' => $this->can_delete_messages,
                'can_manage_video_chats' => $this->can_manage_video_chats,
                'can_restrict_members' => $this->can_restrict_members,
                'can_promote_members' => $this->can_promote_members,
                'can_change_info' => $this->can_change_info,
                'can_invite_users' => $this->can_invite_users,
                'can_post_messages' => $this->can_post_messages,
                'can_edit_messages' => $this->can_edit_messages,
                'can_pin_messages' => $this->can_pin_messages,
                'can_manage_topics' => $this->can_manage_topics,
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return ChatAdministratorRights
         * @noinspection DuplicatedCode
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->is_anonymous = $data['is_anonymous'] ?? false;
            $object->can_manage_chat = $data['can_manage_chat'] ?? false;
            $object->can_delete_messages = $data['can_delete_messages'] ?? false;
            $object->can_manage_video_chats = $data['can_manage_video_chats'] ?? false;
            $object->can_restrict_members = $data['can_restrict_members'] ?? false;
            $object->can_promote_members = $data['can_promote_members'] ?? false;
            $object->can_change_info = $data['can_change_info'] ?? false;
            $object->can_invite_users = $data['can_invite_users'] ?? false;
            $object->can_post_messages = $data['can_post_messages'] ?? false;
            $object->can_edit_messages = $data['can_edit_messages'] ?? false;
            $object->can_pin_messages = $data['can_pin_messages'] ?? false;
            $object->can_manage_topics = $data['can_manage_topics'] ?? false;

            return $object;
        }
    }