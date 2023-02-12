<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Abstracts\ChatType;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Chat implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $id;

        /**
         * @var string
         */
        private $type;

        /**
         * @var string|null
         */
        private $title;

        /**
         * @var string|null
         */
        private $username;

        /**
         * @var string|null
         */
        private $first_name;

        /**
         * @var string|null
         */
        private $last_name;

        /**
         * @var bool
         */
        private $is_forum;

        /**
         * @var ChatPhoto|null
         */
        private $photo;

        /**
         * @var string[]|null
         */
        private $active_usernames;

        /**
         * @var string|null
         */
        private $emoji_status_custom_emoji_id;

        /**
         * @var string|null
         */
        private $bio;

        /**
         * @var bool
         */
        private $has_private_forwards;

        /**
         * @var bool
         */
        private $has_restricted_voice_and_video_messages;

        /**
         * @var bool
         */
        private $join_to_send_messages;

        /**
         * @var bool
         */
        private $join_by_request;

        /**
         * @var string|null
         */
        private $description;

        /**
         * @var string|null
         */
        private $invite_link;

        /**
         * @var Message|null
         */
        private $pinned_message;

        /**
         * @var ChatPermissions|null
         */
        private $permissions;

        /**
         * @var int|null
         */
        private $slow_mode_delay;

        /**
         * @var int|null
         */
        private $message_auto_delete_time;

        /**
         * @var bool
         */
        private $has_aggressive_anti_spam_enabled;

        /**
         * @var bool
         */
        private $has_hidden_members;

        /**
         * @var bool
         */
        private $has_protected_content;

        /**
         * @var string|null
         */
        private $sticker_set_name;

        /**
         * @var bool
         */
        private $can_set_sticker_set;

        /**
         * @var int|null
         */
        private $linked_chat_id;

        /**
         * @var ChatLocation|null
         */
        private $location;

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
         * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
         *
         * @return string
         * @see ChatType
         */
        public function getType(): string
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
         * @see https://telegram.org/blog/topics-in-groups-collectible-usernames#topics-in-groups
         * @return bool
         */
        public function isIsForum(): bool
        {
            return $this->is_forum;
        }

        /**
         * Optional. Chat photo. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return ChatPhoto|null
         */
        public function getPhoto(): ?ChatPhoto
        {
            return $this->photo;
        }

        /**
         * Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels.
         * Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return string[]|null
         */
        public function getActiveUsernames(): ?array
        {
            return $this->active_usernames;
        }

        /**
         * Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in
         * getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return string|null
         */
        public function getEmojiStatusCustomEmojiId(): ?string
        {
            return $this->emoji_status_custom_emoji_id;
        }

        /**
         * Optional. Bio of the other party in a private chat. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return string|null
         */
        public function getBio(): ?string
        {
            return $this->bio;
        }

        /**
         * Optional. True, if privacy settings of the other party in the private chat allows to use
         * tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function hasPrivateForwards(): bool
        {
            return $this->has_private_forwards;
        }

        /**
         * Optional. True, if the privacy settings of the other party restrict sending voice and video note messages
         * in the private chat. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function hasRestrictedVoiceAndVideoMessages(): bool
        {
            return $this->has_restricted_voice_and_video_messages;
        }

        /**
         * Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function canJoinToSendMessages(): bool
        {
            return $this->join_to_send_messages;
        }

        /**
         * Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators.
         * Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function canJoinByRequest(): bool
        {
            return $this->join_by_request;
        }

        /**
         * Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return string|null
         */
        public function getDescription(): ?string
        {
            return $this->description;
        }

        /**
         * Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return string|null
         */
        public function getInviteLink(): ?string
        {
            return $this->invite_link;
        }

        /**
         * Optional. The most recent pinned message (by sending date). Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return Message|null
         */
        public function getPinnedMessage(): ?Message
        {
            return $this->pinned_message;
        }

        /**
         * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return ChatPermissions|null
         */
        public function getPermissions(): ?ChatPermissions
        {
            return $this->permissions;
        }

        /**
         * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each
         * unpriviledged user; in seconds. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return int|null
         */
        public function getSlowModeDelay(): ?int
        {
            return $this->slow_mode_delay;
        }

        /**
         * Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds.
         * Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return int|null
         */
        public function getMessageAutoDeleteTime(): ?int
        {
            return $this->message_auto_delete_time;
        }

        /**
         * Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to
         * chat administrators. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function isHasAggressiveAntiSpamEnabled(): bool
        {
            return $this->has_aggressive_anti_spam_enabled;
        }

        /**
         * Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned
         * only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function isHasHiddenMembers(): bool
        {
            return $this->has_hidden_members;
        }

        /**
         * Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function isHasProtectedContent(): bool
        {
            return $this->has_protected_content;
        }

        /**
         * Optional. For supergroups, name of group sticker set. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return string|null
         */
        public function getStickerSetName(): ?string
        {
            return $this->sticker_set_name;
        }

        /**
         * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
         *
         * @see https://core.telegram.org/bots/api#getchat
         * @return bool
         */
        public function isCanSetStickerSet(): bool
        {
            return $this->can_set_sticker_set;
        }

        /**
         * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice
         * versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming
         * languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed
         * 64-bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
         *
         * @return int|null
         */
        public function getLinkedChatId(): ?int
        {
            return $this->linked_chat_id;
        }

        /**
         *  	Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
         *
         * @return ChatLocation|null
         */
        public function getLocation(): ?ChatLocation
        {
            return $this->location;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'type' => $this->type,
                'title' => $this->title,
                'username' => $this->username,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'is_forum' => $this->is_forum,
                'photo' => ($this->photo instanceof ChatPhoto) ? $this->photo->toArray() : null,
                'active_usernames' => $this->active_usernames,
                'emoji_status_custom_emoji_id' => $this->emoji_status_custom_emoji_id,
                'bio' => $this->bio,
                'has_private_forwards' => $this->has_private_forwards,
                'has_restricted_voice_and_video_messages' => $this->has_restricted_voice_and_video_messages,
                'join_to_send_messages' => $this->join_to_send_messages,
                'join_by_request' => $this->join_by_request,
                'description' => $this->description,
                'invite_link' => $this->invite_link,
                'pinned_message' => ($this->pinned_message instanceof Message) ? $this->pinned_message->toArray() : null,
                'permissions' => ($this->permissions instanceof ChatPermissions) ? $this->permissions->toArray() : null,
                'slow_mode_delay' => $this->slow_mode_delay,
                'message_auto_delete_time' => $this->message_auto_delete_time,
                'has_aggressive_anti_spam_enabled' => $this->has_aggressive_anti_spam_enabled,
                'has_hidden_members' => $this->has_hidden_members,
                'has_protected_content' => $this->has_protected_content,
                'sticker_set_name' => $this->sticker_set_name,
                'can_set_sticker_set' => $this->can_set_sticker_set,
                'linked_chat_id' => $this->linked_chat_id,
                'location' => ($this->location instanceof ChatLocation) ? $this->location->toArray() : null,
            ];
        }

        /**
         * Constructs a new Chat object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->id = $data['id'];
            $object->type = $data['type'];
            $object->title = $data['title'] ?? null;
            $object->username = $data['username'] ?? null;
            $object->first_name = $data['first_name'] ?? null;
            $object->last_name = $data['last_name'] ?? null;
            $object->is_forum = $data['is_forum'] ?? null;
            $object->photo = isset($data['photo']) ? ChatPhoto::fromArray($data['photo']) : null;
            $object->active_usernames = $data['active_usernames'] ?? null;
            $object->emoji_status_custom_emoji_id = $data['emoji_status_custom_emoji_id'] ?? null;
            $object->bio = $data['bio'] ?? null;
            $object->has_private_forwards = $data['has_private_forwards'] ?? null;
            $object->has_restricted_voice_and_video_messages = $data['has_restricted_voice_and_video_messages'] ?? null;
            $object->join_to_send_messages = $data['join_to_send_messages'] ?? null;
            $object->join_by_request = $data['join_by_request'] ?? null;
            $object->description = $data['description'] ?? null;
            $object->invite_link = $data['invite_link'] ?? null;
            $object->pinned_message = isset($data['pinned_message']) ? Message::fromArray($data['pinned_message']) : null;
            $object->permissions = isset($data['permissions']) ? ChatPermissions::fromArray($data['permissions']) : null;
            $object->slow_mode_delay = $data['slow_mode_delay'] ?? null;
            $object->message_auto_delete_time = $data['message_auto_delete_time'] ?? null;
            $object->has_aggressive_anti_spam_enabled = $data['has_aggressive_anti_spam_enabled'] ?? null;
            $object->has_hidden_members = $data['has_hidden_members'] ?? null;
            $object->has_protected_content = $data['has_protected_content'] ?? null;
            $object->sticker_set_name = $data['sticker_set_name'] ?? null;
            $object->can_set_sticker_set = $data['can_set_sticker_set'] ?? null;
            $object->linked_chat_id = $data['linked_chat_id'] ?? null;
            $object->location = isset($data['location']) ? ChatLocation::fromArray($data['location']) : null;

            return $object;
        }
    }