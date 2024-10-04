<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\ChatType;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatFullInfo implements ObjectTypeInterface
    {
        private int $id;
        private ChatType $type;
        private ?string $title;
        private ?string $username;
        private ?string $first_name;
        private ?string $last_name;
        private bool $is_forum;
        private int $accent_color_id;
        private int $max_reaction_count;
        private ?PhotoSize $photo;
        /**
         * @var string[]|null
         */
        private ?array $active_usernames;
        private ?Birthdate $birthdate;
        private ?BusinessIntro $business_intro;
        private ?BusinessLocation $business_location;
        private ?BusinessOpeningHours $business_opening_hours;
        private ?Chat $personal_chat;
        /**
         * @var ReactionType[]|null
         */
        private ?array $available_reactions;
        private ?string $background_custom_emoji_id;
        private ?int $profile_accent_color_id;
        private ?string $profile_background_custom_emoji_id;
        private ?string $emoji_status_custom_emoji_id;
        private ?int $emoji_status_expiration_date;
        private ?string $bio;
        private bool $has_private_forwards;
        private bool $has_restricted_voice_and_video_messages;
        private bool $join_to_send_messages;
        private bool $join_by_request;
        private ?string $description;
        private ?string $invite_link;
        private ?Message $pinned_message;
        private ?ChatPermissions $permissions;
        private bool $can_send_paid_media;
        private ?int $slow_mode_delay;
        private ?int $unrestrict_boost_count;
        private ?int $message_auto_delete_time;
        private bool $has_aggressive_anti_spam_enabled;
        private bool $has_hidden_members;
        private bool $has_protected_content;
        private bool $has_visible_history;
        private ?string $sticker_set_name;
        private bool $can_set_sticker_set;
        private ?string $custom_emoji_sticker_set_name;
        private ?int $linked_chat_id;
        private ?ChatLocation $location;

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
         * Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
         *
         * @return ChatType
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
         * @return bool
         */
        public function isForum(): bool
        {
            return $this->is_forum;
        }

        /**
         * Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header,
         * and link preview. See accent colors for more details.
         *
         * @return int
         */
        public function getAccentColorId(): int
        {
            return $this->accent_color_id;
        }

        /**
         * The maximum number of reactions that can be set on a message in the chat
         *
         * @return int
         */
        public function getMaxReactionCount(): int
        {
            return $this->max_reaction_count;
        }

        /**
         * Optional. Chat photo
         *
         * @return PhotoSize|null
         */
        public function getPhoto(): ?PhotoSize
        {
            return $this->photo;
        }

        /**
         * Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels
         *
         * @return string[]|null
         */
        public function getActiveUsernames(): ?array
        {
            return $this->active_usernames;
        }

        /**
         * Optional. For private chats, the date of birth of the user
         *
         * @return Birthdate|null
         */
        public function getBirthdate(): ?Birthdate
        {
            return $this->birthdate;
        }

        /**
         * Optional. For private chats with business accounts, the intro of the business
         *
         * @return BusinessIntro|null
         */
        public function getBusinessIntro(): ?BusinessIntro
        {
            return $this->business_intro;
        }

        /**
         * Optional. For private chats with business accounts, the location of the business
         *
         * @return BusinessLocation|null
         */
        public function getBusinessLocation(): ?BusinessLocation
        {
            return $this->business_location;
        }

        /**
         * Optional. For private chats with business accounts, the opening hours of the business
         *
         * @return BusinessOpeningHours|null
         */
        public function getBusinessOpeningHours(): ?BusinessOpeningHours
        {
            return $this->business_opening_hours;
        }

        /**
         * Optional. For private chats, the personal channel of the user
         *
         * @return Chat|null
         */
        public function getPersonalChat(): ?Chat
        {
            return $this->personal_chat;
        }

        /**
         * Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed.
         *
         * @return ReactionType[]|null
         */
        public function getAvailableReactions(): ?array
        {
            return $this->available_reactions;
        }

        /**
         * Optional. Custom emoji identifier of the emoji chosen by the chat for the reply header
         * and link preview background
         *
         * @return string|null
         */
        public function getBackgroundCustomEmojiId(): ?string
        {
            return $this->background_custom_emoji_id;
        }

        /**
         * Optional. Identifier of the accent color for the chat's profile background. See profile accent colors for more details.
         *
         * @return int|null
         */
        public function getProfileAccentColorId(): ?int
        {
            return $this->profile_accent_color_id;
        }

        /**
         * Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background
         *
         * @return string|null
         */
        public function getProfileBackgroundCustomEmojiId(): ?string
        {
            return $this->profile_background_custom_emoji_id;
        }

        /**
         * Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat
         *
         * @return string|null
         */
        public function getEmojiStatusCustomEmojiId(): ?string
        {
            return $this->emoji_status_custom_emoji_id;
        }

        /**
         * Optional. Expiration date of the emoji status of the chat or the other
         * party in a private chat, in Unix time, if any
         *
         * @return int|null
         */
        public function getEmojiStatusExpirationDate(): ?int
        {
            return $this->emoji_status_expiration_date;
        }

        /**
         * Optional. Bio of the other party in a private chat
         *
         * @return string|null
         */
        public function getBio(): ?string
        {
            return $this->bio;
        }

        /**
         * Optional. True, if privacy settings of the other party in the private chat
         * allows to use tg://user?id=<user_id> links only in chats with the user
         *
         * @return bool
         */
        public function hasPrivateForwards(): bool
        {
            return $this->has_private_forwards;
        }

        /**
         * Optional. True, if the privacy settings of the other party restrict sending voice and
         * video note messages in the private chat
         *
         * @return bool
         */
        public function hasRestrictedVoiceAndVideoMessages(): bool
        {
            return $this->has_restricted_voice_and_video_messages;
        }

        /**
         * Optional. True, if users need to join the supergroup before they can send messages
         *
         * @return bool
         */
        public function joinToSendMessages(): bool
        {
            return $this->join_to_send_messages;
        }

        /**
         * Optional. True, if all users directly joining the supergroup without using an invite link
         * need to be approved by supergroup administrators
         *
         * @return bool
         */
        public function joinByRequest(): bool
        {
            return $this->join_by_request;
        }

        /**
         * Optional. Description, for groups, supergroups and channel chats
         *
         * @return string|null
         */
        public function getDescription(): ?string
        {
            return $this->description;
        }

        /**
         * Optional. Primary invite link, for groups, supergroups and channel chats
         *
         * @return string|null
         */
        public function getInviteLink(): ?string
        {
            return $this->invite_link;
        }

        /**
         * Optional. The most recent pinned message (by sending date)
         *
         * @return Message|null
         */
        public function getPinnedMessage(): ?Message
        {
            return $this->pinned_message;
        }

        /**
         * Optional. Default chat member permissions, for groups and supergroups
         *
         * @return ChatPermissions|null
         */
        public function getPermissions(): ?ChatPermissions
        {
            return $this->permissions;
        }

        /**
         * Optional. True, if paid media messages can be sent or forwarded to the channel chat.
         * The field is available only for channel chats.
         *
         * @return bool
         */
        public function canSendPaidMedia(): bool
        {
            return $this->can_send_paid_media;
        }

        /**
         * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged user; in seconds
         *
         * @return int|null
         */
        public function getSlowModeDelay(): ?int
        {
            return $this->slow_mode_delay;
        }

        /**
         * Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to
         * add in order to ignore slow mode and chat permissions
         *
         * @return int|null
         */
        public function getUnrestrictBoostCount(): ?int
        {
            return $this->unrestrict_boost_count;
        }

        /**
         * Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds
         *
         * @return int|null
         */
        public function getMessageAutoDeleteTime(): ?int
        {
            return $this->message_auto_delete_time;
        }

        /**
         * Optional. True, if aggressive anti-spam checks are enabled in the supergroup.
         * The field is only available to chat administrators.
         *
         * @return bool
         */
        public function hasAggressiveAntiSpamEnabled(): bool
        {
            return $this->has_aggressive_anti_spam_enabled;
        }

        /**
         * Optional. True, if non-administrators can only get the list of bots and administrators in the chat
         *
         * @return bool
         */
        public function hasHiddenMembers(): bool
        {
            return $this->has_hidden_members;
        }

        /**
         * Optional. True, if messages from the chat can't be forwarded to other chats
         *
         * @return bool
         */
        public function hasProtectedContent(): bool
        {
            return $this->has_protected_content;
        }

        /**
         * Optional. True, if new chat members will have access to old messages; available only to chat administrators
         *
         * @return bool
         */
        public function hasVisibleHistory(): bool
        {
            return $this->has_visible_history;
        }

        /**
         * Optional. For supergroups, name of the group sticker set
         *
         * @return string|null
         */
        public function getStickerSetName(): ?string
        {
            return $this->sticker_set_name;
        }

        /**
         * Optional. True, if the bot can change the group sticker set
         *
         * @return bool
         */
        public function canSetStickerSet(): bool
        {
            return $this->can_set_sticker_set;
        }

        /**
         * Optional. For supergroups, the name of the group's custom emoji sticker set.
         * Custom emoji from this set can be used by all users and bots in the group.
         *
         * @return string|null
         */
        public function getCustomEmojiStickerSetName(): ?string
        {
            return $this->custom_emoji_sticker_set_name;
        }

        /**
         * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice
         * versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming
         * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed
         * 64 bit integer or double-precision float type are safe for storing this identifier.
         *
         * @return int|null
         */
        public function getLinkedChatId(): ?int
        {
            return $this->linked_chat_id;
        }

        /**
         * Optional. For supergroups, the location to which the supergroup is connected
         *
         * @return ChatLocation|null
         */
        public function getLocation(): ?ChatLocation
        {
            return $this->location;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'id' => $this->id,
                'type' => $this->type->value,
                'title' => $this->title,
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'is_forum' => $this->is_forum,
                'accent_color_id' => $this->accent_color_id,
                'max_reaction_count' => $this->max_reaction_count,
                'photo' => $this->photo?->toArray(),
                'active_usernames' => $this->active_usernames,
                'birthdate' => $this->birthdate?->toArray(),
                'business_intro' => $this->business_intro?->toArray(),
                'business_location' => $this->business_location?->toArray(),
                'business_opening_hours' => $this->business_opening_hours?->toArray(),
                'personal_chat' => $this->personal_chat?->toArray(),
                'available_reactions' => is_null($this->available_reactions) ? null : array_map(fn(ReactionType $reaction) => $reaction->toArray(), $this->available_reactions),
                'background_custom_emoji_id' => $this->background_custom_emoji_id,
                'profile_accent_color_id' => $this->profile_accent_color_id,
                'profile_background_custom_emoji_id' => $this->profile_background_custom_emoji_id,
                'emoji_status_custom_emoji_id' => $this->emoji_status_custom_emoji_id,
                'emoji_status_expiration_date' => $this->emoji_status_expiration_date,
                'bio' => $this->bio,
                'has_private_forwards' => $this->has_private_forwards,
                'has_restricted_voice_and_video_messages' => $this->has_restricted_voice_and_video_messages,
                'join_to_send_messages' => $this->join_to_send_messages,
                'join_by_request' => $this->join_by_request,
                'description' => $this->description,
                'invite_link' => $this->invite_link,
                'pinned_message' => $this->pinned_message?->toArray(),
                'permissions' => $this->permissions?->toArray(),
                'can_send_paid_media' => $this->can_send_paid_media,
                'slow_mode_delay' => $this->slow_mode_delay,
                'unrestrict_boost_count' => $this->unrestrict_boost_count,
                'message_auto_delete_time' => $this->message_auto_delete_time,
                'has_aggressive_anti_spam_enabled' => $this->has_aggressive_anti_spam_enabled,
                'has_hidden_members' => $this->has_hidden_members,
                'has_protected_content' => $this->has_protected_content,
                'has_visible_history' => $this->has_visible_history,
                'sticker_set_name' => $this->sticker_set_name,
                'can_set_sticker_set' => $this->can_set_sticker_set,
                'custom_emoji_sticker_set_name' => $this->custom_emoji_sticker_set_name,
                'linked_chat_id' => $this->linked_chat_id,
                'location' => $this->location?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ObjectTypeInterface
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->id = $data['id'];
            $object->type = ChatType::tryFrom($data['type']);
            $object->title = $data['title'] ?? null;
            $object->username = $data['username'] ?? null;
            $object->first_name = $data['first_name'] ?? null;
            $object->last_name = $data['last_name'] ?? null;
            $object->is_forum = $data['is_forum'] ?? false;
            $object->accent_color_id = $data['accent_color_id'];
            $object->max_reaction_count = $data['max_reaction_count'];
            $object->photo = isset($data['photo']) ? PhotoSize::fromArray($data['photo']) : null;
            $object->active_usernames = $data['active_usernames'] ?? null;
            $object->birthdate = isset($data['birthdate']) ? Birthdate::fromArray($data['birthdate']) : null;
            $object->business_intro = isset($data['business_intro']) ? BusinessIntro::fromArray($data['business_intro']) : null;
            $object->business_location = isset($data['business_location']) ? BusinessLocation::fromArray($data['business_location']) : null;
            $object->business_opening_hours = isset($data['business_opening_hours']) ? BusinessOpeningHours::fromArray($data['business_opening_hours']) : null;
            $object->personal_chat = isset($data['personal_chat']) ? Chat::fromArray($data['personal_chat']) : null;
            $object->available_reactions = isset($data['available_reactions']) ? array_map(fn($reaction) => ReactionType::fromArray($reaction), $data['available_reactions']) : null;
            $object->background_custom_emoji_id = $data['background_custom_emoji_id'] ?? null;
            $object->profile_accent_color_id = $data['profile_accent_color_id'] ?? null;
            $object->profile_background_custom_emoji_id = $data['profile_background_custom_emoji_id'] ?? null;
            $object->emoji_status_custom_emoji_id = $data['emoji_status_custom_emoji_id'] ?? null;
            $object->emoji_status_expiration_date = $data['emoji_status_expiration_date'] ?? null;
            $object->bio = $data['bio'] ?? null;
            $object->has_private_forwards = $data['has_private_forwards'] ?? false;
            $object->has_restricted_voice_and_video_messages = $data['has_restricted_voice_and_video_messages'] ?? false;
            $object->join_to_send_messages = $data['join_to_send_messages'] ?? false;
            $object->join_by_request = $data['join_by_request'] ?? false;
            $object->description = $data['description'] ?? null;
            $object->invite_link = $data['invite_link'] ?? null;
            $object->pinned_message = isset($data['pinned_message']) ? Message::fromArray($data['pinned_message']) : null;
            $object->permissions = isset($data['permissions']) ? ChatPermissions::fromArray($data['permissions']) : null;
            $object->can_send_paid_media = $data['can_send_paid_media'] ?? false;
            $object->slow_mode_delay = $data['slow_mode_delay'] ?? null;
            $object->unrestrict_boost_count = $data['unrestrict_boost_count'] ?? null;
            $object->message_auto_delete_time = $data['message_auto_delete_time'] ?? null;
            $object->has_aggressive_anti_spam_enabled = $data['has_aggressive_anti_spam_enabled'] ?? false;
            $object->has_hidden_members = $data['has_hidden_members'] ?? false;
            $object->has_protected_content = $data['has_protected_content'] ?? false;
            $object->has_visible_history = $data['has_visible_history'] ?? false;
            $object->sticker_set_name = $data['sticker_set_name'] ?? null;
            $object->can_set_sticker_set = $data['can_set_sticker_set'] ?? false;
            $object->custom_emoji_sticker_set_name = $data['custom_emoji_sticker_set_name'] ?? null;
            $object->linked_chat_id = $data['linked_chat_id'] ?? null;
            $object->location = isset($data['location']) ? ChatLocation::fromArray($data['location']) : null;

            return $object;
        }
    }