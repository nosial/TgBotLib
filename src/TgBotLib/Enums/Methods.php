<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Methods\ApproveChatJoinRequest;
    use TgBotLib\Methods\BanChatMember;
    use TgBotLib\Methods\BanChatSenderChat;
    use TgBotLib\Methods\Close;
    use TgBotLib\Methods\CopyMessage;
    use TgBotLib\Methods\CopyMessages;
    use TgBotLib\Methods\CreateChatInviteLink;
    use TgBotLib\Methods\CreateChatSubscriptionInviteLink;
    use TgBotLib\Methods\DeclineChatJoinRequest;
    use TgBotLib\Methods\DeleteChatPhoto;
    use TgBotLib\Methods\DeleteWebhook;
    use TgBotLib\Methods\EditChatInviteLink;
    use TgBotLib\Methods\EditChatSubscriptionInviteLink;
    use TgBotLib\Methods\ExportChatInviteLink;
    use TgBotLib\Methods\ForwardMessage;
    use TgBotLib\Methods\ForwardMessages;
    use TgBotLib\Methods\GetFile;
    use TgBotLib\Methods\GetMe;
    use TgBotLib\Methods\GetUpdates;
    use TgBotLib\Methods\GetUserProfilePhotos;
    use TgBotLib\Methods\GetWebhookInfo;
    use TgBotLib\Methods\Logout;
    use TgBotLib\Methods\PinChatMessage;
    use TgBotLib\Methods\PromoteChatMember;
    use TgBotLib\Methods\RestrictChatMember;
    use TgBotLib\Methods\RevokeChatInviteLink;
    use TgBotLib\Methods\SendAnimation;
    use TgBotLib\Methods\SendAudio;
    use TgBotLib\Methods\SendChatAction;
    use TgBotLib\Methods\SendContact;
    use TgBotLib\Methods\SendDice;
    use TgBotLib\Methods\SendDocument;
    use TgBotLib\Methods\SendLocation;
    use TgBotLib\Methods\SendMediaGroup;
    use TgBotLib\Methods\SendMessage;
    use TgBotLib\Methods\SendPaidMedia;
    use TgBotLib\Methods\SendPhoto;
    use TgBotLib\Methods\SendPoll;
    use TgBotLib\Methods\SendVenue;
    use TgBotLib\Methods\SendVideo;
    use TgBotLib\Methods\SendVideoNote;
    use TgBotLib\Methods\SendVoice;
    use TgBotLib\Methods\SetChatAdministratorCustomTitle;
    use TgBotLib\Methods\SetChatDescription;
    use TgBotLib\Methods\SetChatPermissions;
    use TgBotLib\Methods\SetChatPhoto;
    use TgBotLib\Methods\SetChatTitle;
    use TgBotLib\Methods\SetMessageReaction;
    use TgBotLib\Methods\SetWebhook;
    use TgBotLib\Methods\UnbanChatMember;
    use TgBotLib\Methods\UnbanChatSenderChat;

    enum Methods : string
    {
        case GET_UPDATES = 'getUpdates';
        case SET_WEBHOOK = 'setWebhook';
        case DELETE_WEBHOOK = 'deleteWebhook';
        case GET_WEBHOOK_INFO = 'getWebhookInfo';
        case GET_ME = 'getMe';
        case LOGOUT = 'logOut';
        case CLOSE = 'close';
        case SEND_MESSAGE = 'sendMessage';
        case FORWARD_MESSAGE = 'forwardMessage';
        case FORWARD_MESSAGES = 'forwardMessages';
        case COPY_MESSAGE = 'copyMessage';
        case COPY_MESSAGES = 'copyMessages';
        case SEND_PHOTO = 'sendPhoto';
        case SEND_AUDIO = 'sendAudio';
        case SEND_DOCUMENT = 'sendDocument';
        case SEND_VIDEO = 'sendVideo';
        case SEND_ANIMATION = 'sendAnimation';
        case SEND_VOICE = 'sendVoice';
        case SEND_VIDEO_NOTE = 'sendVideoNote';
        case SEND_PAID_MEDIA = 'sendPaidMedia';
        case SEND_MEDIA_GROUP = 'sendMediaGroup';
        case SEND_LOCATION = 'sendLocation';
        case SEND_VENUE = 'sendVenue';
        case SEND_CONTACT = 'sendContact';
        case SEND_POLL = 'sendPoll';
        case SEND_DICE = 'sendDice';
        case SEND_CHAT_ACTION = 'sendChatAction';
        case SET_MESSAGE_REACTION = 'setMessageReaction';
        case GET_USER_PROFILE_PHOTOS = 'getUserProfilePhotos';
        case GET_FILE = 'getFile';
        case BAN_CHAT_MEMBER = 'banChatMember';
        case UNBAN_CHAT_MEMBER = 'unbanChatMember';
        case RESTRICT_CHAT_MEMBER = 'restrictChatMember';
        case PROMOTE_CHAT_MEMBER = 'promoteChatMember';
        case SET_CHAT_ADMINISTRATOR_CUSTOM_TITLE = 'setChatAdministratorCustomTitle';
        case BAN_CHAT_SENDER_CHAT = 'banChatSenderChat';
        case UNBAN_CHAT_SENDER_CHAT = 'unbanChatSenderChat';
        case SET_CHAT_PERMISSIONS = 'setChatPermissions';
        case EXPORT_CHAT_INVITE_LINK = 'exportChatInviteLink';
        case CREATE_CHAT_INVITE_LINK = 'createChatInviteLink';
        case EDIT_CHAT_INVITE_LINK = 'editChatInviteLink';
        case CREATE_CHAT_SUBSCRIPTION_INVITE_LINK = 'createChatSubscriptionInviteLink';
        case EDIT_CHAT_SUBSCRIPTION_INVITE_LINK = 'editChatSubscriptionInviteLink';
        case REVOKE_CHAT_INVITE_LINK = 'revokeChatInviteLink';
        case APPROVE_CHAT_JOIN_REQUEST = 'approveChatJoinRequest';
        case DECLINE_CHAT_JOIN_REQUEST = 'declineChatJoinRequest';
        case SET_CHAT_PHOTO = 'setChatPhoto';
        case DELETE_CHAT_PHOTO = 'deleteChatPhoto';
        case SET_CHAT_TITLE = 'setChatTitle';
        case SET_CHAT_DESCRIPTION = 'setChatDescription';
        case PIN_CHAT_MESSAGE = 'pinChatMessage';

        /**
         * Executes a command on the provided bot with the given parameters.
         *
         * @param Bot $bot The bot instance on which the command will be executed.
         * @param array $parameters Optional parameters for the command.
         * @return ObjectTypeInterface|mixed The result of the command execution, varies based on the command.
         * @throws TelegramException if the command execution fails.
         */
        public function execute(Bot $bot, array $parameters=[]): mixed
        {
            return match($this)
            {
                self::GET_UPDATES => GetUpdates::execute($bot, $parameters),
                self::SET_WEBHOOK => SetWebhook::execute($bot, $parameters),
                self::DELETE_WEBHOOK => DeleteWebhook::execute($bot, $parameters),
                self::GET_WEBHOOK_INFO => GetWebhookInfo::execute($bot, $parameters),
                self::GET_ME => GetMe::execute($bot, $parameters),
                self::LOGOUT => LogOut::execute($bot, $parameters),
                self::CLOSE => Close::execute($bot, $parameters),
                self::SEND_MESSAGE => SendMessage::execute($bot, $parameters),
                self::FORWARD_MESSAGE => ForwardMessage::execute($bot, $parameters),
                self::FORWARD_MESSAGES => ForwardMessages::execute($bot, $parameters),
                self::COPY_MESSAGE => CopyMessage::execute($bot, $parameters),
                self::COPY_MESSAGES => CopyMessages::execute($bot, $parameters),
                self::SEND_PHOTO => SendPhoto::execute($bot, $parameters),
                self::SEND_AUDIO => SendAudio::execute($bot, $parameters),
                self::SEND_DOCUMENT => SendDocument::execute($bot, $parameters),
                self::SEND_VIDEO => SendVideo::execute($bot, $parameters),
                self::SEND_ANIMATION => SendAnimation::execute($bot, $parameters),
                self::SEND_VOICE => SendVoice::execute($bot, $parameters),
                self::SEND_VIDEO_NOTE => SendVideoNote::execute($bot, $parameters),
                self::SEND_PAID_MEDIA => SendPaidMedia::execute($bot, $parameters),
                self::SEND_MEDIA_GROUP => SendMediaGroup::execute($bot, $parameters),
                self::SEND_LOCATION => SendLocation::execute($bot, $parameters),
                self::SEND_VENUE => SendVenue::execute($bot, $parameters),
                self::SEND_CONTACT => SendContact::execute($bot, $parameters),
                self::SEND_POLL => SendPoll::execute($bot, $parameters),
                self::SEND_DICE => SendDice::execute($bot, $parameters),
                self::SEND_CHAT_ACTION => SendChatAction::execute($bot, $parameters),
                self::SET_MESSAGE_REACTION => SetMessageReaction::execute($bot, $parameters),
                self::GET_USER_PROFILE_PHOTOS => GetUserProfilePhotos::execute($bot, $parameters),
                self::GET_FILE => GetFile::execute($bot, $parameters),
                self::BAN_CHAT_MEMBER => BanChatMember::execute($bot, $parameters),
                self::UNBAN_CHAT_MEMBER => UnbanChatMember::execute($bot, $parameters),
                self::RESTRICT_CHAT_MEMBER => RestrictChatMember::execute($bot, $parameters),
                self::PROMOTE_CHAT_MEMBER => PromoteChatMember::execute($bot, $parameters),
                self::SET_CHAT_ADMINISTRATOR_CUSTOM_TITLE => SetChatAdministratorCustomTitle::execute($bot, $parameters),
                self::BAN_CHAT_SENDER_CHAT => BanChatSenderChat::execute($bot, $parameters),
                self::UNBAN_CHAT_SENDER_CHAT => UnbanChatSenderChat::execute($bot, $parameters),
                self::SET_CHAT_PERMISSIONS => SetChatPermissions::execute($bot, $parameters),
                self::EXPORT_CHAT_INVITE_LINK => ExportChatInviteLink::execute($bot, $parameters),
                self::CREATE_CHAT_INVITE_LINK => CreateChatInviteLink::execute($bot, $parameters),
                self::EDIT_CHAT_INVITE_LINK => EditChatInviteLink::execute($bot, $parameters),
                self::CREATE_CHAT_SUBSCRIPTION_INVITE_LINK => CreateChatSubscriptionInviteLink::execute($bot, $parameters),
                self::EDIT_CHAT_SUBSCRIPTION_INVITE_LINK => EditChatSubscriptionInviteLink::execute($bot, $parameters),
                self::REVOKE_CHAT_INVITE_LINK => RevokeChatInviteLink::execute($bot, $parameters),
                self::APPROVE_CHAT_JOIN_REQUEST => ApproveChatJoinRequest::execute($bot, $parameters),
                self::DECLINE_CHAT_JOIN_REQUEST => DeclineChatJoinRequest::execute($bot, $parameters),
                self::SET_CHAT_PHOTO => SetChatPhoto::execute($bot, $parameters),
                self::DELETE_CHAT_PHOTO => DeleteChatPhoto::execute($bot, $parameters),
                self::SET_CHAT_TITLE => SetChatTitle::execute($bot, $parameters),
                self::SET_CHAT_DESCRIPTION => SetChatDescription::execute($bot, $parameters),
                self::PIN_CHAT_MESSAGE => PinChatMessage::execute($bot, $parameters),
            };
        }
    }
