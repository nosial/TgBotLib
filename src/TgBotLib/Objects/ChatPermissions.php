<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatPermissions implements ObjectTypeInterface
    {
        private bool $can_send_messages;
        private bool $can_send_audios;
        private bool $can_send_documents;
        private bool $can_send_photos;
        private bool $can_send_videos;
        private bool $can_send_videos_notes;
        private bool $can_send_voice_notes;
        private bool $can_send_polls;
        private bool $can_send_other_messages;
        private bool $can_add_web_page_previews;
        private bool $can_change_info;
        private bool $can_invite_users;
        private bool $can_pin_messages;
        private bool $can_manage_topics;

        /**
         * Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues
         *
         * @return bool
         */
        public function canSendMessages(): bool
        {
            return $this->can_send_messages;
        }

        /**
         * Optional. True, if the user is allowed to send audios
         *
         * @return bool
         */
        public function canSendAudios(): bool
        {
            return $this->can_send_audios;
        }

        /**
         * Optional. True, if the user is allowed to send documents
         *
         * @return bool
         */
        public function canSendDocuments(): bool
        {
            return $this->can_send_documents;
        }

        /**
         * Optional. True, if the user is allowed to send photos
         *
         * @return bool
         */
        public function canSendPhotos(): bool
        {
            return $this->can_send_photos;
        }

        /**
         * Optional. True, if the user is allowed to send videos
         *
         * @return bool
         */
        public function canSendVideos(): bool
        {
            return $this->can_send_videos;
        }

        /**
         * Optional. True, if the user is allowed to send video notes
         *
         * @return bool
         */
        public function canSendVideosNotes(): bool
        {
            return $this->can_send_videos_notes;
        }

        /**
         * Optional. True, if the user is allowed to send voice notes
         *
         * @return bool
         */
        public function canSendVoiceNotes(): bool
        {
            return $this->can_send_voice_notes;
        }

        /**
         * Optional. True, if the user is allowed to send polls
         *
         * @return bool
         */
        public function canSendPolls(): bool
        {
            return $this->can_send_polls;
        }

        /**
         * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots
         *
         * @return bool
         */
        public function canSendOtherMessages(): bool
        {
            return $this->can_send_other_messages;
        }

        /**
         * Optional. True, if the user is allowed to add web page previews to their messages
         *
         * @return bool
         */
        public function canAddWebPagePreviews(): bool
        {
            return $this->can_add_web_page_previews;
        }

        /**
         * Optional. True, if the user is allowed to change the chat title, photo and other settings.
         * Ignored in public supergroups
         *
         * @return bool
         */
        public function canChangeInfo(): bool
        {
            return $this->can_change_info;
        }

        /**
         * Optional. True, if the user is allowed to invite new users to the chat
         *
         * @return bool
         */
        public function canInviteUsers(): bool
        {
            return $this->can_invite_users;
        }

        /**
         * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
         *
         * @return bool
         */
        public function canPinMessages(): bool
        {
            return $this->can_pin_messages;
        }

        /**
         * Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value
         * of can_pin_messages
         *
         * @return bool
         */
        public function canManageTopics(): bool
        {
            return $this->can_manage_topics;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'can_send_messages' => $this->can_send_messages,
                'can_send_audios' => $this->can_send_audios,
                'can_send_documents' => $this->can_send_documents,
                'can_send_photos' => $this->can_send_photos,
                'can_send_videos' => $this->can_send_videos,
                'can_send_videos_notes' => $this->can_send_videos_notes,
                'can_send_voice_notes' => $this->can_send_voice_notes,
                'can_send_polls' => $this->can_send_polls,
                'can_send_other_messages' => $this->can_send_other_messages,
                'can_add_web_page_previews' => $this->can_add_web_page_previews,
                'can_change_info' => $this->can_change_info,
                'can_invite_users' => $this->can_invite_users,
                'can_pin_messages' => $this->can_pin_messages,
                'can_manage_topics' => $this->can_manage_topics,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatPermissions
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->can_send_messages = $data['can_send_messages'] ?? false;
            $object->can_send_audios = $data['can_send_audios'] ?? false;
            $object->can_send_documents = $data['can_send_documents'] ?? false;
            $object->can_send_photos = $data['can_send_photos'] ?? false;
            $object->can_send_videos = $data['can_send_videos'] ?? false;
            $object->can_send_videos_notes = $data['can_send_videos_notes'] ?? false;
            $object->can_send_voice_notes = $data['can_send_voice_notes'] ?? false;
            $object->can_send_polls = $data['can_send_polls'] ?? false;
            $object->can_send_other_messages = $data['can_send_other_messages'] ?? false;
            $object->can_add_web_page_previews = $data['can_add_web_page_previews'] ?? false;
            $object->can_change_info = $data['can_change_info'] ?? false;
            $object->can_invite_users = $data['can_invite_users'] ?? false;
            $object->can_pin_messages = $data['can_pin_messages'] ?? false;
            $object->can_manage_topics = $data['can_manage_topics'] ?? false;

            return $object;
        }
    }