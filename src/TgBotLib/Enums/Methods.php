<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Methods\AnswerCallbackQuery;
    use TgBotLib\Methods\ApproveChatJoinRequest;
    use TgBotLib\Methods\BanChatMember;
    use TgBotLib\Methods\BanChatSenderChat;
    use TgBotLib\Methods\Close;
    use TgBotLib\Methods\CloseForumTopic;
    use TgBotLib\Methods\CloseGeneralForumTopic;
    use TgBotLib\Methods\CopyMessage;
    use TgBotLib\Methods\CopyMessages;
    use TgBotLib\Methods\CreateChatInviteLink;
    use TgBotLib\Methods\CreateChatSubscriptionInviteLink;
    use TgBotLib\Methods\CreateForumTopic;
    use TgBotLib\Methods\CreateNewStickerSet;
    use TgBotLib\Methods\DeclineChatJoinRequest;
    use TgBotLib\Methods\DeleteChatPhoto;
    use TgBotLib\Methods\DeleteChatStickerSet;
    use TgBotLib\Methods\DeleteForumTopic;
    use TgBotLib\Methods\DeleteMessage;
    use TgBotLib\Methods\DeleteMessages;
    use TgBotLib\Methods\DeleteMyCommands;
    use TgBotLib\Methods\DeleteWebhook;
    use TgBotLib\Methods\EditChatInviteLink;
    use TgBotLib\Methods\EditChatSubscriptionInviteLink;
    use TgBotLib\Methods\EditForumTopic;
    use TgBotLib\Methods\EditGeneralForumTopic;
    use TgBotLib\Methods\EditMessageCaption;
    use TgBotLib\Methods\EditMessageLiveLocation;
    use TgBotLib\Methods\EditMessageMedia;
    use TgBotLib\Methods\EditMessageReplyMarkup;
    use TgBotLib\Methods\EditMessageText;
    use TgBotLib\Methods\ExportChatInviteLink;
    use TgBotLib\Methods\ForwardMessage;
    use TgBotLib\Methods\ForwardMessages;
    use TgBotLib\Methods\GetBusinessConnection;
    use TgBotLib\Methods\GetChat;
    use TgBotLib\Methods\GetChatAdministrators;
    use TgBotLib\Methods\GetChatMember;
    use TgBotLib\Methods\GetChatMemberCount;
    use TgBotLib\Methods\GetChatMenuButton;
    use TgBotLib\Methods\GetCustomEmojiStickers;
    use TgBotLib\Methods\GetFile;
    use TgBotLib\Methods\GetForumTopicIconStickers;
    use TgBotLib\Methods\GetMe;
    use TgBotLib\Methods\GetMyCommands;
    use TgBotLib\Methods\GetMyDefaultAdministratorRights;
    use TgBotLib\Methods\GetMyDescription;
    use TgBotLib\Methods\GetMyName;
    use TgBotLib\Methods\GetMyShortDescription;
    use TgBotLib\Methods\GetStickerSet;
    use TgBotLib\Methods\GetUpdates;
    use TgBotLib\Methods\GetUserChatBoosts;
    use TgBotLib\Methods\GetUserProfilePhotos;
    use TgBotLib\Methods\GetWebhookInfo;
    use TgBotLib\Methods\HideGeneralForumTopic;
    use TgBotLib\Methods\LeaveChat;
    use TgBotLib\Methods\Logout;
    use TgBotLib\Methods\PinChatMessage;
    use TgBotLib\Methods\PromoteChatMember;
    use TgBotLib\Methods\ReopenForumTopic;
    use TgBotLib\Methods\ReopenGeneralForumTopic;
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
    use TgBotLib\Methods\SendSticker;
    use TgBotLib\Methods\SendVenue;
    use TgBotLib\Methods\SendVideo;
    use TgBotLib\Methods\SendVideoNote;
    use TgBotLib\Methods\SendVoice;
    use TgBotLib\Methods\SetChatAdministratorCustomTitle;
    use TgBotLib\Methods\SetChatDescription;
    use TgBotLib\Methods\SetChatMenuButton;
    use TgBotLib\Methods\SetChatPermissions;
    use TgBotLib\Methods\SetChatPhoto;
    use TgBotLib\Methods\SetChatStickerSet;
    use TgBotLib\Methods\SetChatTitle;
    use TgBotLib\Methods\SetMessageReaction;
    use TgBotLib\Methods\SetMyCommands;
    use TgBotLib\Methods\SetMyDefaultAdministratorRights;
    use TgBotLib\Methods\SetMyDescription;
    use TgBotLib\Methods\SetMyName;
    use TgBotLib\Methods\SetMyShortDescription;
    use TgBotLib\Methods\SetWebhook;
    use TgBotLib\Methods\StopMessageLiveLocation;
    use TgBotLib\Methods\StopPoll;
    use TgBotLib\Methods\UnbanChatMember;
    use TgBotLib\Methods\UnbanChatSenderChat;
    use TgBotLib\Methods\UnhideGeneralForumTopic;
    use TgBotLib\Methods\UnpinAllChatMessages;
    use TgBotLib\Methods\UnpinAllForumTopicMessages;
    use TgBotLib\Methods\UnpinAllGeneralForumTopicMessages;
    use TgBotLib\Methods\UnpinChatMessage;
    use TgBotLib\Methods\UploadStickerFile;

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
        case UNPIN_CHAT_MESSAGE = 'unpinChatMessage';
        case UNPIN_ALL_CHAT_MESSAGES = 'unpinAllChatMessages';
        case LEAVE_CHAT = 'leaveChat';
        case GET_CHAT = 'getChat';
        case GET_CHAT_ADMINISTRATORS = 'getChatAdministrators';
        case GET_CHAT_MEMBER_COUNT = 'getChatMemberCount';
        case GET_CHAT_MEMBER = 'getChatMember';
        case SET_CHAT_STICKER_SET = 'setChatStickerSet';
        case DELETE_CHAT_STICKER_SET = 'deleteChatStickerSet';
        case GET_FORUM_TOPIC_ICON_STICKERS = 'getForumTopicIconStickers';
        case CREATE_FORUM_TOPIC = 'createForumTopic';
        case EDIT_FORUM_TOPIC = 'editForumTopic';
        case CLOSE_FORUM_TOPIC = 'closeForumTopic';
        case REOPEN_FORUM_TOPIC = 'reopenForumTopic';
        case DELETE_FORUM_TOPIC = 'deleteForumTopic';
        case UNPIN_ALL_FORUM_TOPIC_MESSAGES = 'unpinAllForumTopicMessages';
        case EDIT_GENERAL_FORUM_TOPIC = 'editGeneralForumTopic';
        case CLOSE_GENERAL_FORUM_TOPIC = 'closeGeneralForumTopic';
        case REOPEN_GENERAL_FORUM_TOPIC = 'reopenGeneralForumTopic';
        case HIDE_GENERAL_FORUM_TOPIC = 'hideGeneralForumTopic';
        case UNHIDE_GENERAL_FORUM_TOPIC = 'unhideGeneralForumTopic';
        case UNPIN_ALL_GENERAL_FORUM_TOPIC_MESSAGES = 'unpinAllGeneralForumTopicMessages';
        case ANSWER_CALLBACK_QUERY = 'answerCallbackQuery';
        case GET_USER_CHAT_BOOSTS = 'getUserChatBoosts';
        case GET_BUSINESS_CONNECTION = 'getBusinessConnection';
        case SET_MY_COMMANDS = 'setMyCommands';
        case DELETE_MY_COMMANDS = 'deleteMyCommands';
        case GET_MY_COMMANDS = 'getMyCommands';
        case SET_MY_NAME = 'setMyName';
        case GET_MY_NAME = 'getMyName';
        case SET_MY_DESCRIPTION = 'setMyDescription';
        case GET_MY_DESCRIPTION = 'getMyDescription';
        case SET_MY_SHORT_DESCRIPTION = 'setMyShortDescription';
        case GET_MY_SHORT_DESCRIPTION = 'getMyShortDescription';
        case SET_CHAT_MENU_BUTTON = 'setChatMenuButton';
        case GET_CHAT_MENU_BUTTON = 'getChatMenuButton';
        case SET_MY_DEFAULT_ADMINISTRATOR_RIGHTS = 'setMyDefaultAdministratorRights';
        case GET_MY_DEFAULT_ADMINISTRATOR_RIGHTS = 'getMyDefaultAdministratorRights';
        case EDIT_MESSAGE_TEXT = 'editMessageText';
        case EDIT_MESSAGE_CAPTION = 'editMessageCaption';
        case EDIT_MESSAGE_MEDIA = 'editMessageMedia';
        case EDIT_MESSAGE_LIVE_LOCATION = 'editMessageLiveLocation';
        case STOP_MESSAGE_LIVE_LOCATION = 'stopMessageLiveLocation';
        case EDIT_MESSAGE_REPLY_MARKUP = 'editMessageReplyMarkup';
        case STOP_POLL = 'stopPoll';
        case DELETE_MESSAGE = 'deleteMessage';
        case DELETE_MESSAGES = 'deleteMessages';
        case SEND_STICKER = 'sendSticker';
        case GET_STICKER_SET = 'getStickerSet';
        case GET_CUSTOM_EMOJI_STICKERS = 'getCustomEmojiStickers';
        case UPLOAD_STICKER_FILE = 'uploadStickerFile';
        case CREATE_NEW_STICKER_SET = 'createNewStickerSet';

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
                self::UNPIN_CHAT_MESSAGE => UnpinChatMessage::execute($bot, $parameters),
                self::UNPIN_ALL_CHAT_MESSAGES => UnpinAllChatMessages::execute($bot, $parameters),
                self::LEAVE_CHAT => LeaveChat::execute($bot, $parameters),
                self::GET_CHAT => GetChat::execute($bot, $parameters),
                self::GET_CHAT_ADMINISTRATORS => GetChatAdministrators::execute($bot, $parameters),
                self::GET_CHAT_MEMBER_COUNT => GetChatMemberCount::execute($bot, $parameters),
                self::GET_CHAT_MEMBER => GetChatMember::execute($bot, $parameters),
                self::SET_CHAT_STICKER_SET  => SetChatStickerSet::execute($bot, $parameters),
                self::DELETE_CHAT_STICKER_SET => DeleteChatStickerSet::execute($bot, $parameters),
                self::GET_FORUM_TOPIC_ICON_STICKERS => GetForumTopicIconStickers::execute($bot, $parameters),
                self::CREATE_FORUM_TOPIC => CreateForumTopic::execute($bot, $parameters),
                self::EDIT_FORUM_TOPIC => EditForumTopic::execute($bot, $parameters),
                self::CLOSE_FORUM_TOPIC => CloseForumTopic::execute($bot, $parameters),
                self::REOPEN_FORUM_TOPIC => ReopenForumTopic::execute($bot, $parameters),
                self::DELETE_FORUM_TOPIC => DeleteForumTopic::execute($bot, $parameters),
                self::UNPIN_ALL_FORUM_TOPIC_MESSAGES => UnpinAllForumTopicMessages::execute($bot, $parameters),
                self::EDIT_GENERAL_FORUM_TOPIC => EditGeneralForumTopic::execute($bot, $parameters),
                self::CLOSE_GENERAL_FORUM_TOPIC => CloseGeneralForumTopic::execute($bot, $parameters),
                self::REOPEN_GENERAL_FORUM_TOPIC => ReopenGeneralForumTopic::execute($bot, $parameters),
                self::HIDE_GENERAL_FORUM_TOPIC => HideGeneralForumTopic::execute($bot, $parameters),
                self::UNHIDE_GENERAL_FORUM_TOPIC => UnhideGeneralForumTopic::execute($bot, $parameters),
                self::UNPIN_ALL_GENERAL_FORUM_TOPIC_MESSAGES => UnpinAllGeneralForumTopicMessages::execute($bot, $parameters),
                self::ANSWER_CALLBACK_QUERY => AnswerCallbackQuery::execute($bot, $parameters),
                self::GET_USER_CHAT_BOOSTS => GetUserChatBoosts::execute($bot, $parameters),
                self::GET_BUSINESS_CONNECTION => GetBusinessConnection::execute($bot, $parameters),
                self::SET_MY_COMMANDS => SetMyCommands::execute($bot, $parameters),
                self::DELETE_MY_COMMANDS => DeleteMyCommands::execute($bot, $parameters),
                self::GET_MY_COMMANDS => GetMyCommands::execute($bot, $parameters),
                self::SET_MY_NAME => SetMyName::execute($bot, $parameters),
                self::GET_MY_NAME => GetMyName::execute($bot, $parameters),
                self::SET_MY_DESCRIPTION => SetMyDescription::execute($bot, $parameters),
                self::GET_MY_DESCRIPTION => GetMyDescription::execute($bot, $parameters),
                self::SET_MY_SHORT_DESCRIPTION => SetMyShortDescription::execute($bot, $parameters),
                self::GET_MY_SHORT_DESCRIPTION => GetMyShortDescription::execute($bot, $parameters),
                self::SET_CHAT_MENU_BUTTON => SetChatMenuButton::execute($bot, $parameters),
                self::GET_CHAT_MENU_BUTTON => GetChatMenuButton::execute($bot, $parameters),
                self::SET_MY_DEFAULT_ADMINISTRATOR_RIGHTS => SetMyDefaultAdministratorRights::execute($bot, $parameters),
                self::GET_MY_DEFAULT_ADMINISTRATOR_RIGHTS => GetMyDefaultAdministratorRights::execute($bot, $parameters),
                self::EDIT_MESSAGE_TEXT => EditMessageText::execute($bot, $parameters),
                self::EDIT_MESSAGE_CAPTION => EditMessageCaption::execute($bot, $parameters),
                self::EDIT_MESSAGE_MEDIA => EditMessageMedia::execute($bot, $parameters),
                self::EDIT_MESSAGE_LIVE_LOCATION => EditMessageLiveLocation::execute($bot, $parameters),
                self::STOP_MESSAGE_LIVE_LOCATION => StopMessageLiveLocation::execute($bot, $parameters),
                self::EDIT_MESSAGE_REPLY_MARKUP => EditMessageReplyMarkup::execute($bot, $parameters),
                self::STOP_POLL => StopPoll::execute($bot, $parameters),
                self::DELETE_MESSAGE => DeleteMessage::execute($bot, $parameters),
                self::DELETE_MESSAGES => DeleteMessages::execute($bot, $parameters),
                self::SEND_STICKER => SendSticker::execute($bot, $parameters),
                self::GET_STICKER_SET => GetStickerSet::execute($bot, $parameters),
                self::GET_CUSTOM_EMOJI_STICKERS => GetCustomEmojiStickers::execute($bot, $parameters),
                self::UPLOAD_STICKER_FILE => UploadStickerFile::execute($bot, $parameters),
                self::CREATE_NEW_STICKER_SET => CreateNewStickerSet::execute($bot, $parameters),
            };
        }
    }
