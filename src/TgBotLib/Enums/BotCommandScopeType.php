<?php

    namespace TgBotLib\Enums;

    final class BotCommandScopeType
    {
        public const DEFAULT = 'default';
        public const ALL_PRIVATE_CHATS = 'all_private_chats';
        public const ALL_CHAT_GROUPS = 'all_group_chats';
        public const ALL_CHAT_ADMINISTRATORS = 'all_chat_administrators';
        public const CHAT = 'chat';
        public const CHAT_ADMINISTRATORS = 'chat_administrators';
        public const CHAT_MEMBER = 'chat_member';
    }