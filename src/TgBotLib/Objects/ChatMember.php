<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatMember implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $status;

        /**
         * @var User
         */
        private $user;

        /**
         * @var string|null
         */
        private $custom_title;

        /**
         * @var bool
         */
        private $is_member;

        /**
         * @var bool
         */
        private $is_anonymous;

        /**
         * @var bool
         */
        private $can_send_messages;

        /**
         * @var bool
         */
        private $can_send_audios;

        /**
         * @var bool
         */
        private $can_send_documents;

        /**
         * @var bool
         */
        private $can_send_photos;

        /**
         * @var bool
         */
        private $can_send_videos;

        /**
         * @var bool
         */
        private $can_send_video_notes;

        /**
         * @var bool
         */
        private $can_send_voice_notes;

        /**
         * @var bool
         */
        private $can_send_polls;

        /**
         * @var bool
         */
        private $can_send_other_messages;

        /**
         * @var bool
         */
        private $can_add_web_page_previews;

        /**
         * @var bool
         */
        private $can_change_info;

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
         * @var bool
         */
        private $can_be_edited;

        /**
         * @var int|null
         */
        private $until_date;

        /**
         * The member's status in the chat, can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
         *
         * @return string
         */
        public function getStatus(): string
        {
            return $this->status;
        }

        /**
         * Information about the user
         *
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * Optional. Custom title for this user
         *
         * @return string|null
         */
        public function getCustomTitle(): ?string
        {
            return $this->custom_title;
        }

        /**
         * True, if the user is a member of the chat at the moment of the request
         *
         * @return bool
         */
        public function isIsMember(): bool
        {
            return $this->is_member;
        }

        /**
         * True, if the user's presence in the chat is hidden
         *
         * @return bool
         */
        public function isIsAnonymous(): bool
        {
            return $this->is_anonymous;
        }

        /**
         * True, if the user is allowed to send text messages, contacts, invoices, locations and venues
         *
         * @return bool
         */
        public function isCanSendMessages(): bool
        {
            return $this->can_send_messages;
        }

        /**
         * True, if the user is allowed to send audios
         *
         * @return bool
         */
        public function isCanSendAudios(): bool
        {
            return $this->can_send_audios;
        }

        /**
         * True, if the user is allowed to send documents
         *
         * @return bool
         */
        public function isCanSendDocuments(): bool
        {
            return $this->can_send_documents;
        }

        /**
         * True, if the user is allowed to send photos
         *
         * @return bool
         */
        public function isCanSendPhotos(): bool
        {
            return $this->can_send_photos;
        }

        /**
         * True, if the user is allowed to send videos
         *
         * @return bool
         */
        public function isCanSendVideos(): bool
        {
            return $this->can_send_videos;
        }

        /**
         * True, if the user is allowed to send video notes
         *
         * @return bool
         */
        public function isCanSendVideoNotes(): bool
        {
            return $this->can_send_video_notes;
        }

        /**
         * True, if the user is allowed to send voice notes
         *
         * @return bool
         */
        public function isCanSendVoiceNotes(): bool
        {
            return $this->can_send_voice_notes;
        }

        /**
         * True, if the user is allowed to send polls
         *
         * @return bool
         */
        public function isCanSendPolls(): bool
        {
            return $this->can_send_polls;
        }

        /**
         * True, if the user is allowed to send animations, games, stickers and use inline bots
         *
         * @return bool
         */
        public function isCanSendOtherMessages(): bool
        {
            return $this->can_send_other_messages;
        }

        /**
         * True, if the user is allowed to add web page previews to their messages
         *
         * @return bool
         */
        public function isCanAddWebPagePreviews(): bool
        {
            return $this->can_add_web_page_previews;
        }

        /**
         * True, if the user is allowed to change the chat title, photo and other settings
         *
         * @return bool
         */
        public function isCanChangeInfo(): bool
        {
            return $this->can_change_info;
        }

        /**
         * True, if the administrator can access the chat event log, chat statistics, message statistics in channels,
         * see channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any
         * other administrator privilege
         *
         * @return bool
         */
        public function isCanManageChat(): bool
        {
            return $this->can_manage_chat;
        }

        /**
         * True, if the administrator can delete messages of other users
         *
         * @return bool
         */
        public function isCanDeleteMessages(): bool
        {
            return $this->can_delete_messages;
        }

        /**
         * True, if the administrator can manage video chats
         *
         * @return bool
         */
        public function isCanManageVideoChats(): bool
        {
            return $this->can_manage_video_chats;
        }

        /**
         * True, if the administrator can restrict, ban or unban chat members
         *
         * @return bool
         */
        public function isCanRestrictMembers(): bool
        {
            return $this->can_restrict_members;
        }

        /**
         * True, if the administrator can add new administrators with a subset of their own privileges or demote
         * administrators that they have promoted, directly or indirectly (promoted by administrators that
         * were appointed by the user)
         *
         * @return bool
         */
        public function isCanPromoteMembers(): bool
        {
            return $this->can_promote_members;
        }

        /**
         * True, if the user is allowed to invite new users to the chat
         *
         * @return bool
         */
        public function isCanInviteUsers(): bool
        {
            return $this->can_invite_users;
        }

        /**
         * Optional. True, if the administrator can post in the channel; channels only
         *
         * @return bool
         */
        public function isCanPostMessages(): bool
        {
            return $this->can_post_messages;
        }

        /**
         * Optional. True, if the administrator can edit messages of other users and can pin messages; channels only
         *
         * @return bool
         */
        public function isCanEditMessages(): bool
        {
            return $this->can_edit_messages;
        }

        /**
         * Optional. True, if the user is allowed to pin messages; groups and supergroups only
         *
         * @return bool
         */
        public function isCanPinMessages(): bool
        {
            return $this->can_pin_messages;
        }

        /**
         * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only
         *
         * @return bool
         */
        public function isCanManageTopics(): bool
        {
            return $this->can_manage_topics;
        }

        /**
         * True, if the bot is allowed to edit administrator privileges of that user
         *
         * @return bool
         */
        public function isCanBeEdited(): bool
        {
            return $this->can_be_edited;
        }

        /**
         * Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever
         *
         * @return int|null
         */
        public function getUntilDate(): ?int
        {
            return $this->until_date;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'status' => $this->status,
                'user' => ($this->user instanceof User) ? $this->user->toArray() : $this->user,
                'custom_title' => $this->custom_title,
                'is_member' => $this->is_member,
                'is_anonymous' => $this->is_anonymous,
                'can_send_messages' => $this->can_send_messages,
                'can_send_audios' => $this->can_send_audios,
                'can_send_documents' => $this->can_send_documents,
                'can_send_photos' => $this->can_send_photos,
                'can_send_videos' => $this->can_send_videos,
                'can_send_video_notes' => $this->can_send_video_notes,
                'can_send_voice_notes' => $this->can_send_voice_notes,
                'can_send_polls' => $this->can_send_polls,
                'can_send_other_messages' => $this->can_send_other_messages,
                'can_add_web_page_previews' => $this->can_add_web_page_previews,
                'can_change_info' => $this->can_change_info,
                'can_manage_chat' => $this->can_manage_chat,
                'can_delete_messages' => $this->can_delete_messages,
                'can_manage_video_chats' => $this->can_manage_video_chats,
                'can_restrict_members' => $this->can_restrict_members,
                'can_promote_members' => $this->can_promote_members,
                'can_invite_users' => $this->can_invite_users,
                'can_post_messages' => $this->can_post_messages,
                'can_edit_messages' => $this->can_edit_messages,
                'can_pin_messages' => $this->can_pin_messages,
                'can_manage_topics' => $this->can_manage_topics,
                'can_be_edited' => $this->can_be_edited,
                'until_date' => $this->until_date,
             ];
        }

        /**
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new static();

            $object->status = @$data['status'];
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->custom_title = @$data['custom_title'] ?? null;
            $object->is_member = @$data['is_member'] ?? false;
            $object->is_anonymous = @$data['is_anonymous'] ?? false;
            $object->can_send_messages = @$data['can_send_messages'] ?? false;
            $object->can_send_audios = @$data['can_send_audios'] ?? false;
            $object->can_send_documents = @$data['can_send_documents'] ?? false;
            $object->can_send_photos = @$data['can_send_photos'] ?? false;
            $object->can_send_videos = @$data['can_send_videos'] ?? false;
            $object->can_send_video_notes = @$data['can_send_video_notes'] ?? false;
            $object->can_send_voice_notes = @$data['can_send_voice_notes'] ?? false;
            $object->can_send_polls = @$data['can_send_polls'] ?? false;
            $object->can_send_other_messages = @$data['can_send_other_messages'] ?? false;
            $object->can_add_web_page_previews = @$data['can_add_web_page_previews'] ?? false;
            $object->can_change_info = @$data['can_change_info'] ?? false;
            $object->can_manage_chat = @$data['can_manage_chat'] ?? false;
            $object->can_delete_messages = @$data['can_delete_messages'] ?? false;
            $object->can_manage_video_chats = @$data['can_manage_video_chats'] ?? false;
            $object->can_restrict_members = @$data['can_restrict_members'] ?? false;
            $object->can_promote_members = @$data['can_promote_members'] ?? false;
            $object->can_invite_users = @$data['can_invite_users'] ?? false;
            $object->can_post_messages = @$data['can_post_messages'] ?? false;
            $object->can_edit_messages = @$data['can_edit_messages'] ?? false;
            $object->can_pin_messages = @$data['can_pin_messages'] ?? false;
            $object->can_manage_topics = @$data['can_manage_topics'] ?? false;
            $object->can_be_edited = @$data['can_be_edited'] ?? false;
            $object->until_date = @$data['until_date'] ?? null;

            return $object;
        }
    }