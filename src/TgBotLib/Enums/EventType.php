<?php

    namespace TgBotLib\Enums;

    final class EventType
    {
        public const GENERIC_UPDATE = 'generic_update';
        public const MESSAGE = 'message';
        public const EDITED_MESSAGE = 'edited_message';
        public const GENERIC_COMMAND_MESSAGE = 'generic_command_message';
        public const CHAT_MEMBER_JOINED = 'chat_member_joined';
        public const CHAT_MEMBER_LEFT = 'chat_member_left';
        public const CHAT_MEMBER_KICKED = 'chat_member_kicked';
        public const CHAT_MEMBER_BANNED = 'chat_member_banned';
        public const CHAT_MEMBER_UNBANNED = 'chat_member_unbanned';
        public const CHAT_MEMBER_PROMOTED = 'chat_member_promoted';
        public const CHAT_MEMBER_DEMOTED = 'chat_member_demoted';
        public const CHAT_MEMBER_RESTRICTED = 'chat_member_restricted';
        public const CHAT_MEMBER_UNRESTRICTED = 'chat_member_unrestricted';
        public const CHAT_TITLE_CHANGED = 'chat_title_changed';
        public const CHAT_PHOTO_CHANGED = 'chat_photo_changed';
        public const CALLBACK_QUERY = 'callback_query';

        public const All = [
            self::GENERIC_UPDATE,
            self::MESSAGE,
            self::EDITED_MESSAGE,
            self::GENERIC_COMMAND_MESSAGE,
            self::CHAT_MEMBER_JOINED,
            self::CHAT_MEMBER_LEFT,
            self::CHAT_MEMBER_KICKED,
            self::CHAT_MEMBER_BANNED,
            self::CHAT_MEMBER_UNBANNED,
            self::CHAT_MEMBER_PROMOTED,
            self::CHAT_MEMBER_DEMOTED,
            self::CHAT_MEMBER_RESTRICTED,
            self::CHAT_MEMBER_UNRESTRICTED,
            self::CHAT_TITLE_CHANGED,
            self::CHAT_PHOTO_CHANGED,
            self::CALLBACK_QUERY,
        ];

    }