<?php

    namespace TgBotLib\Enums\Types;

    enum EventType : string
    {
        case GENERIC_UPDATE = 'generic_update';
        case MESSAGE = 'message';
        case EDITED_MESSAGE = 'edited_message';
        case GENERIC_COMMAND_MESSAGE = 'generic_command_message';
        case CHAT_MEMBER_JOINED = 'chat_member_joined';
        case CHAT_MEMBER_LEFT = 'chat_member_left';
        case CHAT_MEMBER_KICKED = 'chat_member_kicked';
        case CHAT_MEMBER_BANNED = 'chat_member_banned';
        case CHAT_MEMBER_UNBANNED = 'chat_member_unbanned';
        case CHAT_MEMBER_PROMOTED = 'chat_member_promoted';
        case CHAT_MEMBER_DEMOTED = 'chat_member_demoted';
        case CHAT_MEMBER_RESTRICTED = 'chat_member_restricted';
        case CHAT_MEMBER_UNRESTRICTED = 'chat_member_unrestricted';
        case CHAT_TITLE_CHANGED = 'chat_title_changed';
        case CHAT_PHOTO_CHANGED = 'chat_photo_changed';
        case CALLBACK_QUERY = 'callback_query';
    }