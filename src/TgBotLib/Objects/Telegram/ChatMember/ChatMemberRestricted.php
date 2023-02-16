<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\ChatMember;

    use TgBotLib\Abstracts\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\ChatMember;
    use TgBotLib\Objects\Telegram\User;

    class ChatMemberRestricted implements ObjectTypeInterface
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
         * @var bool
         */
        private $is_member;

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
        private $can_invite_users;

        /**
         * @var bool
         */
        private $can_pin_messages;

        /**
         * @var bool
         */
        private $can_manage_topics;

        /**
         * @var int
         */
        private $until_date;

        /**
         * The member's status in the chat, always “restricted”
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
         * True, if the user is a member of the chat at the moment of the request
         *
         * @return bool
         */
        public function isMember(): bool
        {
            return $this->is_member;
        }

        /**
         * True, if the user is allowed to send text messages, contacts, invoices, locations and venues
         *
         * @return bool
         */
        public function canSendMessages(): bool
        {
            return $this->can_send_messages;
        }

        /**
         * True, if the user is allowed to send audios
         *
         * @return bool
         */
        public function canSendAudios(): bool
        {
            return $this->can_send_audios;
        }

        /**
         * True, if the user is allowed to send documents
         *
         * @return bool
         */
        public function canSendDocuments(): bool
        {
            return $this->can_send_documents;
        }

        /**
         * True, if the user is allowed to send photos
         *
         * @return bool
         */
        public function canSendPhotos(): bool
        {
            return $this->can_send_photos;
        }

        /**
         * True, if the user is allowed to send videos
         *
         * @return bool
         */
        public function canSendVideos(): bool
        {
            return $this->can_send_videos;
        }

        /**
         * True, if the user is allowed to send video notes
         *
         * @return bool
         */
        public function canSendVideoNotes(): bool
        {
            return $this->can_send_video_notes;
        }

        /**
         * True, if the user is allowed to send voice notes
         *
         * @return bool
         */
        public function canSendVoiceNotes(): bool
        {
            return $this->can_send_voice_notes;
        }

        /**
         * True, if the user is allowed to send polls
         *
         * @return bool
         */
        public function canSendPolls(): bool
        {
            return $this->can_send_polls;
        }

        /**
         * True, if the user is allowed to send animations, games, stickers and use inline bots
         *
         * @return bool
         */
        public function canSendOtherMessages(): bool
        {
            return $this->can_send_other_messages;
        }

        /**
         * True, if the user is allowed to add web page previews to their messages
         *
         * @return bool
         */
        public function canAddWebPagePreviews(): bool
        {
            return $this->can_add_web_page_previews;
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
         * True, if the user is allowed to pin messages
         *
         * @return bool
         */
        public function canPinMessages(): bool
        {
            return $this->can_pin_messages;
        }

        /**
         * True, if the user is allowed to create forum topics
         *
         * @return bool
         */
        public function canManageTopics(): bool
        {
            return $this->can_manage_topics;
        }

        /**
         * Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever
         *
         * @return int
         */
        public function getUntilDate(): int
        {
            return $this->until_date;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'status' => $this->status,
                'user' => ($this->user instanceof ObjectTypeInterface) ? $this->user->toArray() : $this->user,
                'is_member' => $this->is_member,
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
                'can_invite_users' => $this->can_invite_users,
                'can_pin_messages' => $this->can_pin_messages,
                'can_manage_topics' => $this->can_manage_topics,
                'until_date' => $this->until_date,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ChatMemberRestricted
         * @noinspection DuplicatedCode
         */
        public static function fromArray(array $data): self
        {
            $object = new static();

            $object->status = $data['status'] ?? ChatMemberStatus::Restricted;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->is_member = $data['is_member'] ?? false;
            $object->can_send_messages = $data['can_send_messages'] ?? false;
            $object->can_send_audios = $data['can_send_audios'] ?? false;
            $object->can_send_documents = $data['can_send_documents'] ?? false;
            $object->can_send_photos = $data['can_send_photos'] ?? false;
            $object->can_send_videos = $data['can_send_videos'] ?? false;
            $object->can_send_video_notes = $data['can_send_video_notes'] ?? false;
            $object->can_send_voice_notes = $data['can_send_voice_notes'] ?? false;
            $object->can_send_polls = $data['can_send_polls'] ?? false;
            $object->can_send_other_messages = $data['can_send_other_messages'] ?? false;
            $object->can_add_web_page_previews = $data['can_add_web_page_previews'] ?? false;
            $object->can_change_info = $data['can_change_info'] ?? false;
            $object->can_invite_users = $data['can_invite_users'] ?? false;
            $object->can_pin_messages = $data['can_pin_messages'] ?? false;
            $object->can_manage_topics = $data['can_manage_topics'] ?? false;
            $object->until_date = $data['until_date'] ?? 0;

            return $object;
        }

        /**
         * Constructs object from ChatMember
         *
         * @param ChatMember $chatMember
         * @return static
         */
        public static function fromChatMember(ChatMember $chatMember): self
        {
            $object = new static();

            $object->status = $chatMember->getStatus();
            $object->user = $chatMember->getUser();
            $object->is_member = $chatMember->isMember();
            $object->can_send_messages = $chatMember->canSendMessages();
            $object->can_send_audios = $chatMember->canSendAudios();
            $object->can_send_documents = $chatMember->canSendDocuments();
            $object->can_send_photos = $chatMember->canSendPhotos();
            $object->can_send_videos = $chatMember->canSendVideos();
            $object->can_send_video_notes = $chatMember->canSendVideoNotes();
            $object->can_send_voice_notes = $chatMember->canSendVoiceNotes();
            $object->can_send_polls = $chatMember->canSendPolls();
            $object->can_send_other_messages = $chatMember->canSendOtherMessages();
            $object->can_add_web_page_previews = $chatMember->canAddWebPagePreviews();
            $object->can_change_info = $chatMember->canChangeInfo();
            $object->can_invite_users = $chatMember->canInviteUsers();
            $object->can_pin_messages = $chatMember->canPinMessages();
            $object->can_manage_topics = $chatMember->canManageTopics();
            $object->until_date = $chatMember->getUntilDate();

            return $object;
        }
    }