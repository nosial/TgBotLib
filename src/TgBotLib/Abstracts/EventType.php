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

        const ChatMemberChanged = 'chat_member_changed';
        const ChatTitleChanged = 'chat_title_changed';
        const ChatPhotoChanged = 'chat_photo_changed';

        const ChatDescriptionChanged = 'chat_description_changed';


    }