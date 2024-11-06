<?php

    namespace TgBotLib\Enums;

    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Methods\Close;
    use TgBotLib\Methods\CopyMessage;
    use TgBotLib\Methods\CopyMessages;
    use TgBotLib\Methods\DeleteWebhook;
    use TgBotLib\Methods\ForwardMessage;
    use TgBotLib\Methods\ForwardMessages;
    use TgBotLib\Methods\GetMe;
    use TgBotLib\Methods\GetUpdates;
    use TgBotLib\Methods\GetUserProfilePhotos;
    use TgBotLib\Methods\GetWebhookInfo;
    use TgBotLib\Methods\Logout;
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
    use TgBotLib\Methods\SetMessageReaction;
    use TgBotLib\Methods\SetWebhook;

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
            };
        }
    }
