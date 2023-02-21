<?php

    namespace TgBotLib\Abstracts;

    abstract class EventType
    {
        const GenericUpdate = 'generic_update';
        const Message = 'message';
        const EditedMessage = 'edited_message';
        const GenericCommandMessage = 'generic_command_message';
        const ChatMemberJoined = 'chat_member_joined';
        const ChatMemberLeft = 'chat_member_left';
        const ChatMemberKicked = 'chat_member_kicked';
        const ChatMemberBanned = 'chat_member_banned';
        const ChatMemberUnbanned = 'chat_member_unbanned';
        const ChatMemberPromoted = 'chat_member_promoted';
        const ChatMemberDemoted = 'chat_member_demoted';
        const ChatMemberRestricted = 'chat_member_restricted';
        const ChatMemberUnrestricted = 'chat_member_unrestricted';
        const ChatTitleChanged = 'chat_title_changed';
        const ChatPhotoChanged = 'chat_photo_changed';
        Const CallbackQuery = 'callback_query';

        const All = [
            self::GenericUpdate,
            self::Message,
            self::EditedMessage,
            self::GenericCommandMessage,
            self::ChatMemberJoined,
            self::ChatMemberLeft,
            self::ChatMemberKicked,
            self::ChatMemberBanned,
            self::ChatMemberUnbanned,
            self::ChatMemberPromoted,
            self::ChatMemberDemoted,
            self::ChatMemberRestricted,
            self::ChatMemberUnrestricted,
            self::ChatTitleChanged,
            self::ChatPhotoChanged,
            self::CallbackQuery,
        ];

    }