<?php

    /**
     * Constructs a new Bot instance.
     *
     * @param string $token The bot token provided by BotFather.
     * @param string $endpoint The API endpoint to use.
     */

    namespace TgBotLib;

    use Exception;
    use InvalidArgumentException;
    use ReflectionClass;
    use TgBotLib\Abstracts\Method;
    use TgBotLib\Classes\Logger;
    use TgBotLib\Enums\EventType;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ChatActionType;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Enums\Types\StickerFormat;
    use TgBotLib\Events\CommandEvent;
    use TgBotLib\Events\UpdateEvent;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\BotCommand;
    use TgBotLib\Objects\BotCommandScope;
    use TgBotLib\Objects\BotDescription;
    use TgBotLib\Objects\BotName;
    use TgBotLib\Objects\BotShortDescription;
    use TgBotLib\Objects\BusinessConnection;
    use TgBotLib\Objects\ChatAdministratorRights;
    use TgBotLib\Objects\ChatFullInfo;
    use TgBotLib\Objects\ChatInviteLink;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\ChatPermissions;
    use TgBotLib\Objects\File;
    use TgBotLib\Objects\ForceReply;
    use TgBotLib\Objects\ForumTopic;
    use TgBotLib\Objects\GameHighScore;
    use TgBotLib\Objects\Gifts;
    use TgBotLib\Objects\Inline\InlineQueryResult;
    use TgBotLib\Objects\Inline\SentWebAppMessage;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\InlineQueryResultsButton;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\InputPollOption;
    use TgBotLib\Objects\LinkPreviewOptions;
    use TgBotLib\Objects\MenuButton;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\MessageId;
    use TgBotLib\Objects\PassportElementError;
    use TgBotLib\Objects\Payments\LabeledPrice;
    use TgBotLib\Objects\Payments\ShippingOption;
    use TgBotLib\Objects\Poll;
    use TgBotLib\Objects\PreparedInlineMessage;
    use TgBotLib\Objects\ReactionType;
    use TgBotLib\Objects\ReplyKeyboardMarkup;
    use TgBotLib\Objects\ReplyKeyboardRemove;
    use TgBotLib\Objects\ReplyParameters;
    use TgBotLib\Objects\StarTransactions;
    use TgBotLib\Objects\Stickers\MaskPosition;
    use TgBotLib\Objects\Stickers\Sticker;
    use TgBotLib\Objects\Stickers\StickerSet;
    use TgBotLib\Objects\Update;
    use TgBotLib\Objects\User;
    use TgBotLib\Objects\UserChatBoosts;
    use TgBotLib\Objects\UserProfilePhotos;

    /**
     * @method Update[] getUpdates(?int $offset=null, ?int $limit=null, ?int $timeout=null, ?string $allowed_updates=null) Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned.
     * @method bool setWebhook(string $url, ?string $certificate=null, ?string $ip_address=null, ?int $max_connections=null, ?string $allowed_updates=null, ?bool $drop_pending_updates=null, ?string $secret_token=null) Use this method to specify a url and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified url, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
     * @method User getMe() A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
     * @method bool logOut() Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
     * @method bool close() Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
     * @method Message sendMessage(string|int $chat_id, string $text, ?string $business_connection_id=null, ?int $message_thread_id=null, string|ParseMode|null $parse_mode=null, ?array $entities=null, ?LinkPreviewOptions $link_preview_options=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send text messages. On success, the sent Message is returned.
     * @method Message forwardMessage(string|int $chat_id, string|int $from_chat_id, int $message_id, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null) Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded. On success, the sent Message is returned.
     * @method MessageId[] forwardMessages(string|int $chat_id, string|int $from_chat_id, int[] $message_ids, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null) Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or forwarded, they are skipped. Service messages and messages with protected content can't be forwarded. Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
     * @method MessageId copyMessage(string|int $chat_id, string|int $from_chat_id, int $message_id, ?int $message_thread_id=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?bool $show_caption_above_media=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
     * @method MessageId[] copyMessages(string|int $chat_id, string|int $from_chat_id, int[] $message_ids, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?bool $remove_caption=null) Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessages, but the copied messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned.
     * @method Message sendPhoto(string|int $chat_id, string $photo, ?string $business_connection_id=null, ?int $message_thread_id=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?bool $show_caption_above_media=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send photos. On success, the sent Message is returned.
     * @method Message sendAudio(string|int $chat_id, string $audio, ?string $business_connection_id=null, ?int $message_thread_id=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?int $duration=null, ?string $performer=null, ?string $title=null, ?string $thumb=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     * @method Message sendDocument(string|int $chat_id, string $document, ?int $message_thread_id=null, ?string $thumbnail=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?bool $disable_content_type_detection=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     * @method Message sendVideo(string|int $chat_id, string $video, ?int $business_connection_id=null, ?int $message_thread_id=null, ?int $duration=null, ?int $width=null, ?int $height=null, ?string $thumbnail=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?bool $show_caption_above_media=null, ?bool $has_spoiler=null, ?bool $supports_streaming=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     * @method Message sendAnimation(string|int $chat_id, string $animation, ?string $business_connection_id=null, ?int $message_thread_id=null, ?int $duration=null, ?int $width=null, ?int $height=null, ?string $thumbnail=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?bool $show_caption_above_media=null, ?bool $has_spoiler=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     * @method Message sendVoice(string|int $chat_id, string $voice, ?string $business_connection_id=null, ?int $message_thread_id=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?int $duration=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     * @method Message sendVideoNote(string|int $chat_id, string $video_note, ?string $business_connection_id=null, ?int $message_thread_id=null, ?int $duration=null, ?int $length=null, ?string $thumbnail=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
     * @method Message sendPaidMedia(string|int $chat_id, int $star_count, array $media, ?string $business_connection_id=null, ?string $payload=null, ?string $caption=null, ?string|ParseMode $parse_mode=null, ?MessageEntity[] $caption_entities=null, ?bool $show_caption_above_media=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send paid media. On success, the sent Message is returned.
     * @method Message[] sendMediaGroup(string|int $chat_id, InputMedia\InputMediaAudio[]|InputMedia\InputMediaDocument[]|InputMedia\InputMediaPhoto[]|InputMedia\InputMediaVideo[] $media, ?string $business_connection_id=null, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null) Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Messages that were sent is returned.
     * @method Message sendLocation(string|int $chat_id, float $latitude, float $longitude, ?string $business_connection_id=null, ?int $message_thread_id=null, ?float $horizontal_accuracy=null, ?int $live_period=null, ?int $heading=null, ?int $proximity_alert_radius=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send point on the map. On success, the sent Message is returned.
     * @method Message sendVenue(string|int $chat_id, float $latitude, float $longitude, string $title, string $address, ?string $business_connection_id=null, ?int $message_thread_id=null, ?string $foursquare_id=null, ?string $foursquare_type=null, ?string $google_place_id=null, ?string $google_place_type=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send information about a venue. On success, the sent Message is returned.
     * @method Message sendContact(string|int $chat_id, string $phone_number, string $first_name, ?string $last_name=null, ?string $vcard=null, ?string $business_connection_id=null, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send phone contacts. On success, the sent Message is returned.
     * @method Message sendPoll(string|int $chat_id, string $question, InputPollOption[] $options, ?string $business_connection_id=null, ?int $message_thread_id=null, string|ParseMode|null $question_parse_mode=null, ?MessageEntity[] $question_entities=null, ?bool $is_anonymous=null, ?string $type=null, ?bool $allows_multiple_answers=null, ?int $correct_option_id=null, ?string $explanation=null, string|ParseMode|null $explanation_parse_mode=null, ?array $explanation_entities=null, ?int $open_period=null, ?int $close_date=null, ?bool $is_closed=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send a native poll. On success, the sent Message is returned.
     * @method Message sendDice(string|int $chat_id, ?string $business_connection_id=null, ?int $message_thread_id=null, ?string $emoji=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
     * @method bool sendChatAction(string|int $chat_id, ChatActionType|string $action, ?string $business_connection_id=null, ?int $message_thread_id=null) Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
     * @method bool setMessageReaction(string|int $chat_id, int $message_id, ?ReactionType[] $reaction=null, ?bool $is_big=null) Use this method to change the chosen reactions on a message. Service messages can't be reacted to. Automatically forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel. Bots can't use paid reactions. Returns True on success.
     * @method UserProfilePhotos getUserProfilePhotos(int $user_id, ?int $offset=null, ?int $limit=null) Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     * @method File getFile(string $file_id) Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
     * @method bool banChatMember(string|int $chat_id, int $user_id, ?int $until_date=null, ?bool $revoke_messages=null) Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool unbanChatMember(string|int $chat_id, int $user_id, ?bool $only_if_banned=null) Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
     * @method bool restrictChatMember(string|int $chat_id, int $user_id, ChatPermissions $permissions, ?bool $use_independent_chat_permissions=null, ?int $until_date=null) Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
     * @method bool promoteChatMember(string|int $chat_id, int $user_id, ?bool $is_anonymous=null, ?bool $can_manage_chat=null, ?bool $can_delete_messages=null, ?bool $can_manage_video_chats=null, ?bool $can_restrict_members=null, ?bool $can_promote_members=null, ?bool $can_change_info=null, ?bool $can_invite_users=null, ?bool $can_post_stories=null, ?bool $can_edit_stories=null, ?bool $can_delete_stories=null, ?bool $can_post_messages=null, ?bool $can_edit_messages=null, ?bool $can_pin_messages=null, ?bool $can_manage_topics=null) Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
     * @method bool setChatAdministratorCustomTitle(string|int $chat_id, int $user_id, string $custom_title) Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
     * @method bool banChatSenderChat(string|int $chat_id, int $sender_chat_id) Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool unbanChatSenderChat(string|int $chat_id, int $sender_chat_id) Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool setChatPermissions(string|int $chat_id, ChatPermissions $permissions, ?bool $use_independent_chat_permissions=null) Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
     * @method string exportChatInviteLink(string|int $chat_id) Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
     * @method ChatInviteLink createChatInviteLink(string|int $chat_id, ?string $name=null, ?int $expire_date=null, ?int $member_limit=null, ?bool $creates_join_request=null) Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
     * @method ChatInviteLink editChatInviteLink(string|int $chat_id, string $invite_link, ?string $name=null, ?int $expire_date=null, ?int $member_limit=null, ?bool $creates_join_request=null) Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
     * @method ChatInviteLink createChatSubscriptionInviteLink(string|int $chat_id, int $subscription_period, int $subscription_price, ?string $name=null) Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator rights. The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new invite link as a ChatInviteLink object.
     * @method ChatInviteLink editChatSubscriptionInviteLink(string|int $chat_id, string $invite_link, ?string $name=null) Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink object.
     * @method ChatInviteLink revokeChatInviteLink(string|int $chat_id, string $invite_link) Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
     * @method bool approveChatJoinRequest(string|int $chat_id, int $user_id) Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     * @method bool setChatPhoto(string|int $chat_id, string $photo) Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool deleteChatPhoto(string|int $chat_id) Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool setChatTitle(string|int $chat_id, string $title) Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool setChatDescription(string|int $chat_id, string $description = null) Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @method bool pinChatMessage(string|int $chat_id, int $message_id, string $business_connection_id = null, bool $disable_notification = null) Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     * @method bool unpinChatMessage(string|int $chat_id, string $business_connection_id = null, int $message_id = null) Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     * @method bool unpinAllChatMessages(string|int $chat_id) Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     * @method bool leaveChat(string|int $chat_id) Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     * @method ChatFullInfo getChat(string|int $chat_id) Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
     * @method ChatMember[] getChatAdministrators(string|int $chat_id) Use this method to get a list of administrators in a chat, which aren't bots. Returns an array of ChatMember objects.
     * @method int getChatMemberCount(string|int $chat_id) Use this method to get the number of members in a chat. Returns int on success.
     * @method ChatMember getChatMember(string|int $chat_id, int $user_id) Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a ChatMember object on success.
     * @method bool setChatStickerSet(string|int $chat_id, string $sticker_set_name) Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     * @method bool deleteChatStickerSet(string|int $chat_id) Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     * @method Sticker[] getForumTopicIconStickers() Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an array of Sticker objects.
     * @method ForumTopic createForumTopic(string|int $chat_id, string $name, int $icon_color = null, string $icon_custom_emoji_id = null) Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
     * @method bool editForumTopic(string|int $chat_id, int $message_thread_id, string $name = null, string $icon_custom_emoji_id = null) Use this method to edit the name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     * @method bool closeForumTopic(string|int $chat_id, int $message_thread_id) Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     * @method bool reopenForumTopic(string|int $chat_id, int $message_thread_id) Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     * @method bool deleteForumTopic(string|int $chat_id, int $message_thread_id) Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
     * @method bool unpinAllForumTopicMessages(string|int $chat_id, int $message_thread_id) Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     * @method bool editGeneralForumTopic(string|int $chat_id, string $name) Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     * @method bool closeGeneralForumTopic(string|int $chat_id) Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     * @method bool reopenGeneralForumTopic(string|int $chat_id) Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
     * @method bool hideGeneralForumTopic(string|int $chat_id) Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns True on success.
     * @method bool unhideGeneralForumTopic(string|int $chat_id) Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     * @method bool unpinAllGeneralForumTopicMessages(string|int $chat_id) Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     * @method bool answerCallbackQuery(string $callback_query_id, string $text = null, bool $show_alert = false, string $url = null, int $cache_time = 0) Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned. Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create a game for your bot via @BotFather and accept the terms. Otherwise, you may use links like t.me/your_bot?start=XXXX that open your bot with a parameter.
     * @method UserChatBoosts getUserChatBoosts(string|int $chat_id, int $user_id) Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a UserChatBoosts object.
     * @method BusinessConnection getBusinessConnection(string $business_connection_id) Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object on success.
     * @method bool setMyCommands(array $commands, BotCommandScope $scope=null, string $language_code=null) Use this method to change the list of the bot's commands. Returns True on success.
     * @method bool deleteMyCommands(BotCommandScope $scope = null, string $language_code = null) Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
     * @method BotCommand[] getMyCommands(BotCommandScope $scope = null, string $language_code = "") Use this method to get the current list of the bot's commands for the given scope and user language. Returns an array of BotCommand objects. If commands aren't set, an empty list is returned.
     * @method bool setMyName(string $name = "", string $language_code = "") Use this method to change the bot's name. Returns True on success.
     * @method BotName getMyName(string $language_code) Use this method to get the current bot name for the given user language. Returns BotName on success.
     * @method bool setMyDescription(?string $description=null, ?string $language_code=null) Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
     * @method BotDescription getMyDescription(?string $language_code=null) Use this method to get the current bot description for the given user language. Returns BotDescription on success.
     * @method bool setMyShortDescription(string $short_description , string $language_code = "") Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
     * @method BotShortDescription getMyShortDescription(string $language_code) Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success.
     * @method bool setChatMenuButton(?int $chat_id=null, ?MenuButton $menu_button=null) Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
     * @method MenuButton getChatMenuButton(?int $chat_id=null) Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
     * @method true setMyDefaultAdministratorRights(?ChatAdministratorRights $rights=null, ?bool $for_channels=false) Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
     * @method ChatAdministratorRights getMyDefaultAdministratorRights(?bool $for_channels=false) Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
     * @method Message editMessageText(string $text, ?string $business_connection_id=null, null|string|int $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null, ?ParseMode $parse_mode=null, MessageEntity[]|null $entities=null, ?LinkPreviewOptions $link_preview_options=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @method Message editMessageCaption(?string $business_connection_id=null, null|string|int $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null, ?string $caption=null, ?ParseMode $parse_mode=null, MessageEntity[]|null $caption_entities=null, ?bool $show_caption_above_media=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @method Message editMessageMedia(string $media, ?string $business_connection_id=null, null|string|int $chat_id=null, int $message_id=null, ?string $inline_message_id=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to edit animation, audio, document, photo, or video messages, or to add media to text messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @method Message|true editMessageLiveLocation(float $latitude, float $longitude, ?string $business_connection_id=null, int|string|null $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null, ?int $live_period=null, ?float $horizontal_accuracy=null, ?int $heading=null, ?int $proximity_alert_radius=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * @method Message stopMessageLiveLocation(?string $business_connection_id=null, int|string|null $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
     * @method Message editMessageReplyMarkup(?string $business_connection_id=null, int|string|null $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @method Poll stopPoll(int|string $chat_id, int $message_id, ?string $business_connection_id=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
     * @method true deleteMessage(int|string $chat_id, int $message_id) Use this method to delete a message, including service messages. Returns True on success.
     * @method true deleteMessages(int|string $chat_id, int[] $message_ids) Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped. Returns True on success.
     * @method Message sendSticker(int|string $chat_id, string $sticker, ?string $business_connection_id=null, ?int $message_thread_id=null, ?string $emoji=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?bool $allow_paid_broadcast=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
     * @method StickerSet getStickerSet(string $name) Use this method to get a sticker set. On success, a StickerSet object is returned.
     * @method Sticker[] getCustomEmojiStickers(string[] $custom_emoji_ids) Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     * @method File uploadStickerFile(int $user_id, string $sticker, StickerFormat $sticker_format) Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the uploaded File on success.
     * @method true createNewStickerSet(int $user_id, string $name, string $title, array $stickers, ?string $sticker_type=null, ?bool $needs_repainting=null) Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
     * @method true addStickerToSet(int $user_id, string $name, string $sticker) Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other sticker sets can have up to 120 stickers. Returns True on success.
     * @method true setStickerPositionInSet(string $sticker, int $position) Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
     * @method true deleteStickerFromSet(string $sticker) Use this method to delete a sticker from a set created by the bot. Returns True on success.
     * @method true replaceStickerInSet(int $user_id, string $name, string $old_sticker, string $sticker) Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet. Returns True on success.
     * @method true setStickerEmojiList(string $sticker, string[] $emoji_list) Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     * @method true setStickerKeywords(string $sticker, string[] $keywords) Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     * @method true setStickerMaskPosition(string $sticker, ?MaskPosition $mask_position=null) Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
     * @method true setStickerSetTitle(string $name, string $title) Use this method to set the title of a created sticker set. Returns True on success.
     * @method true setStickerSetThumbnail(string $name, int $user_id, string $format, ?string $thumbnail=null) Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must be the format of the stickers in the set. Returns True on success.
     * @method true setCustomEmojiStickerSetThumbnail(string $name, ?string $custom_emoji_id=null) Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
     * @method true deleteStickerSet(string $name) Use this method to delete a sticker set that was created by the bot. Returns True on success.
     * @method Gifts getAvailableGifts() Returns the list of gifts that can be sent by the bot to users. Requires no parameters. Returns a Gifts object.
     * @method true sendGift(int $user_id, string $gift_id, ?string $text=null, ?ParseMode $text_parse_mode=null, MessageEntity[]|null $text_entities=null) Sends a gift to the given user. The gift can't be converted to Telegram Stars by the user. Returns True on success.
     * @method true answerInlineQuery(string $inline_query_id, InlineQueryResult[] $results, ?int $cache_time=null, ?bool $is_personal=null, ?string $next_offset=null, ?InlineQueryResultsButton $button=null) Use this method to send answers to an inline query. On success, True is returned.
     * @method SentWebAppMessage answerWebAppQuery(string $web_app_query_id, InlineQueryResult $result) Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
     * @method PreparedInlineMessage savePreparedInlineMessage(int $user_id, InlineQueryResult $result, ?bool $allow_user_chats=null, ?bool $allow_bot_chats=null, ?bool $allow_group_chats=null, ?bool $allow_channel_chats=null) Stores a message that can be sent by a user of a Mini App. Returns a PreparedInlineMessage object.
     * @method Message sendInvoice(int|string $chat_id, string $title, string $description, string $payload, string $currency, LabeledPrice[] $prices, ?int $message_thread_id=null, ?string $provider_token=null, ?int $max_tip_amount=null, int[]|null $suggested_tip_amounts=null, ?string $start_parameter=null, ?string $provider_data=null, ?string $photo_url=null, ?int $photo_size=null, ?int $photo_width=null, ?int $photo_height=null, ?bool $need_name=null, ?bool $need_phone_number=null, ?bool $need_email=null, ?bool $need_shipping_address=null, ?bool $send_phone_number_to_provider=null, ?bool $send_email_to_provider=null, ?bool $is_flexible=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?bool $allow_paid_broadcast=null, ?string $message_effect_id=null, ?ReplyParameters $message_effect_id=null, ?InlineKeyboardMarkup $reply_markup=null) Your bot can accept payments from Telegram users. Please see the introduction to payments for more details on the process and how to set up payments for your bot.
     * @method string createInvoiceLink(string $title, string $description, string $payload, string $currency, LabeledPrice[] $prices, ?string $provider_token=null, ?int $subscription_period=null, ?int $max_tip_amount=null, int[]|null $suggested_tip_amounts=null, ?string $provider_data=null, ?string $photo_url=null, ?int $photo_size=null, ?int $photo_width=null, ?int $photo_height=null, ?bool $need_name=null, ?bool $need_phone_number=null, ?bool $need_email=null, ?bool $need_shipping_address=null, ?bool $send_phone_number_to_provider=null, ?bool $send_email_to_provider=null, ?bool $is_flexible=null) Use this method to create a link for an invoice. Returns the created invoice link as String on success.
     * @method true answerShippingQuery(string $shipping_query_id, bool $ok, ShippingOption[]|null $shipping_options=null, ?string $error_message=null) If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
     * @method true answerPreCheckoutQuery(string $pre_checkout_query_id, bool $ok, ?string $error_message=null) Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     * @method StarTransactions getStarTransactions(?int $offset=null, ?int $limit=null) Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object.
     * @method true refundStarPayment(int $user_id, string $telegram_payment_charge_id) Refunds a successful payment in Telegram Stars. Returns True on success.
     * @method true editUserStarSubscription(int $user_id, string $telegram_payment_charge_id, bool $is_canceled) Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns True on success.
     * @method true setPassportDataErrors(int $user_id, PassportElementError[] $errors) Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
     * @method Message sendGame(int $chat_id, string $game_short_name, ?string $business_connection_id=null, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?bool $allow_paid_broadcast=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, ?InlineKeyboardMarkup $reply_markup=null) Use this method to send a game. On success, the sent Message is returned.
     * @method Message setGameScore(int $user_id, int $score, ?bool $force=null, ?bool $disable_edit_message=null, ?int $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null) Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
     * @method GameHighScore[] getGameHighScores(int $user_id, ?int $chat_id=null, ?int $message_id=null, ?string $inline_message_id=null) Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
     * @throws TelegramException if the method execution fails.
     */
    class Bot
    {
        private string $token;
        private string $endpoint;
        private bool $auto_retry;
        private array $eventHandlers;

        /**
         * Constructs a new Bot instance
         *
         * @param string $token The bot token provided by BotFather
         * @param string $endpoint The API endpoint to use
         */
        public function __construct(string $token, string $endpoint='https://api.telegram.org')
        {
            $this->token = $token;
            $this->endpoint = $endpoint;
            $this->auto_retry = true;
            $this->eventHandlers = [];
        }

        /**
         * Sets the token for the bot.
         *
         * @param string $token The bot token provided by BotFather
         * @return void
         */
        public function setToken(string $token): void
        {
            $this->token = $token;
        }

        /**
         * Retrieves the bot's token
         *
         * @return string The bot token
         */
        public function getToken(): string
        {
            return $this->token;
        }

        /**
         * Sets the API endpoint.
         *
         * @param string $endpoint The new API endpoint to be set.
         * @return void
         */
        public function setEndpoint(string $endpoint): void
        {
            $this->endpoint = $endpoint;
        }

        /**
         * Retrieves the API endpoint or constructs a specific method endpoint
         *
         * @param string|null $method Optional method name to append to the endpoint
         * @return string The complete API endpoint URL
         */
        public function getEndpoint(string $method=null): string
        {
            if($method)
            {
                return sprintf('%s/bot%s/%s', $this->endpoint, $this->token, $method);
            }

            return $this->endpoint;
        }

        /**
         * Sets the auto-retry flag.
         * If set to true, the bot will automatically retry the request only due to a "Too Many Requests" error.
         * the bot will attempt to parse the amount of time to wait and retry the request, this will make
         * method calls block for a longer period of time than usual if the error persists.
         *
         * @param bool $auto_retry The new auto-retry flag to be set.
         * @return void
         */
        public function setAutoRetry(bool $auto_retry): void
        {
            $this->auto_retry = $auto_retry;
        }

        /**
         * Retrieves the auto-retry flag.
         *
         * @return bool The auto-retry flag
         */
        public function getAutoRetry(): bool
        {
            return $this->auto_retry;
        }

        /**
         * Retrieves the list of event handlers.
         *
         * @return array The array of event handlers.
         */
        public function getEventHandlers(): array
        {
            return $this->eventHandlers;
        }

        /**
         * Registers an event handler class for processing events.
         *
         * @param string $className The fully qualified class name of the event handler to add.
         *
         * @return void
         *
         * @throws InvalidArgumentException if the class does not exist or does not extend UpdateEvent.
         */
        public function addEventHandler(string $className): void
        {
            if(in_array($className, $this->eventHandlers))
            {
                return;
            }

            if(!class_exists($className))
            {
                throw new InvalidArgumentException(sprintf('The given className %s does not exist', $className));
            }

            if(!is_subclass_of($className, UpdateEvent::class))
            {
                throw new InvalidArgumentException(sprintf('The given className %s must extend UpdateEvent', $className));
            }

            $this->eventHandlers[] = $className;
        }

        /**
         * Retrieves all event handlers that match a specified event type.
         *
         * @param EventType $type The event type to filter handlers by.
         * @return array An array of event handlers that handle the specified event type.
         */
        public function getEventHandlersByType(EventType $type): array
        {
            $results = [];
            /** @var UpdateEvent $eventHandler */
            foreach($this->eventHandlers as $eventHandler)
            {
                if($eventHandler::getEventType() === $type)
                {
                    $results[] = $eventHandler;
                }
            }

            return $results;
        }

        /**
         * Retrieves an array of event handlers that correspond to the specified command.
         *
         * @param string $command The command to filter the event handlers by.
         * @return array The array of event handlers that match the specified command.
         */
        public function getEventHandlersByCommand(string $command): array
        {
            $results = [];
            /** @var UpdateEvent $eventHandler */
            foreach($this->eventHandlers as $eventHandler)
            {
                if(strtolower($eventHandler::getCommand()) === strtolower($command))
                {
                    $results[] = $eventHandler;
                }
            }

            return $results;
        }

        /**
         * Removes all event handlers.
         *
         * @return void
         */
        public function clearEventHandlers(): void
        {
            $this->eventHandlers = [];
        }

        /**
         * Removes all event handlers of a specified type.
         *
         * @param EventType $type The event type to filter handlers by.
         * @return void
         */
        public function removeEventHandlersByType(EventType $type): void
        {
            $this->eventHandlers = array_filter($this->eventHandlers, function($eventHandler) use ($type)
            {
                return $eventHandler::getEventType() !== $type;
            });
        }

        /**
         * Removes an event handler by its class name if it exists.
         *
         * @param string $className The fully qualified class name of the event handler to remove.
         * @return void
         */
        public function removeEventHandlerByName(string $className): void
        {
            $this->eventHandlers = array_filter($this->eventHandlers, function($eventHandler) use ($className)
            {
                return $eventHandler !== $className;
            });
        }

        /**
         * Handles an incoming update. It first checks if there is a command within the update and
         * processes it with appropriate event handlers. If no command is present, it determines the
         * type of the update and processes it with corresponding event handlers. If no specific event
         * handlers are found for the update type, it falls back to a generic update event handler.
         *
         * @param Update $update The update object to be handled.
         * @return void
         */
        public function handleUpdate(Update $update): void
        {
            Logger::getLogger()->debug(sprintf('Handling update %s', $update->getUpdateId()));

            $command = $update?->getAnyMessage()?->getCommand();
            if($command !== null)
            {
                $commandExecuted = false;
                Logger::getLogger()->debug(sprintf('Executing command %s for update %s', $command, $update->getUpdateId()));

                /** @var CommandEvent $eventHandler */
                foreach($this->getEventHandlersByCommand($command) as $eventHandler)
                {
                    try
                    {
                        (new $eventHandler($update))->handle($this);
                        $commandExecuted = true;
                    }
                    catch(TelegramException $e)
                    {
                        Logger::getLogger()->error(sprintf('Telegram exception occurred: %s', $e->getMessage()), $e);
                    }
                    catch(Exception $e)
                    {
                        Logger::getLogger()->error(sprintf('Exception occurred: %s', $e->getMessage()), $e);
                    }
                }

                if($commandExecuted)
                {
                    return;
                }
            }

            // Get event handlers by type, determine the type of the update
            $eventHandlers = $this->getEventHandlersByType(EventType::determineEventType($update));

            // If there are no appropriate event handlers for the update type, use the generic update event handler
            if(empty($eventHandlers))
            {
                Logger::getLogger()->debug(sprintf('Executing generic update event handler for update %s', $update->getUpdateId()));
                foreach ($this->getEventHandlersByType(EventType::UPDATE_EVENT) as $eventHandler)
                {
                    try
                    {
                        /** @var UpdateEvent $eventHandler */
                        (new $eventHandler($update))->handle($this);
                    }
                    catch(TelegramException $e)
                    {
                        Logger::getLogger()->error(sprintf('Telegram exception occurred: %s', $e->getMessage()), $e);
                    }
                    catch(Exception $e)
                    {
                        Logger::getLogger()->error(sprintf('Exception occurred: %s', $e->getMessage()), $e);
                    }
                }

                // We return early here to avoid executing the generic update event handler twice
                return;
            }

            // Execute all event handlers that match the update type
            /** @var UpdateEvent $eventHandler */
            Logger::getLogger()->debug(sprintf('Executing event handler for type %s for update %s', $eventHandler::getEventType()->value, $update->getUpdateId()));
            foreach($eventHandlers as $eventHandler)
            {
                try
                {
                    (new $eventHandler($update))->handle($this);
                }
                catch(TelegramException $e)
                {
                    Logger::getLogger()->error(sprintf('Telegram exception occurred: %s', $e->getMessage()), $e);
                }
                catch(Exception $e)
                {
                    Logger::getLogger()->error(sprintf('Exception occurred: %s', $e->getMessage()), $e);
                }
            }
        }

        /**
         * Sends a request by executing the specified method with the given parameters.
         *
         * @param string $method The name of the method to execute.
         * @param array $parameters Optional parameters to pass to the method.
         * @return mixed The result of the executed method.
         * @throws TelegramException if the method execution fails.
         */
        public function sendRequest(string $method, array $parameters=[]): mixed
        {
            $method = Methods::tryFrom($method);
            if($method === null)
            {
                throw new InvalidArgumentException('Invalid method name');
            }

            try
            {
                Logger::getLogger()->debug(sprintf('Executing method %s with parameters %s', $method->value, json_encode($parameters)));
                return $method->execute($this, $parameters);
            }
            catch(TelegramException $e)
            {
                if($e->getCode() === 429 && $this->auto_retry)
                {
                    if (preg_match('/retry after (\d+)/', $e->getMessage(), $matches))
                    {
                        $waitTime = (int) $matches[1];
                    }
                    else
                    {
                        $waitTime = 5;
                    }

                    Logger::getLogger()->verbose(sprintf('Too many requests, waiting %d seconds before retrying', $waitTime));
                    sleep($waitTime);

                    return $method->execute($this, $parameters);
                }

                throw $e;
            }
        }

        /**
         * Handles all undefined method calls.
         *
         * @param string $name The method name being called.
         * @param array $arguments The arguments passed to the method.
         * @return mixed The result of the executed method.
         * @throws TelegramException if the method execution fails.
         */
        public function __call(string $name, array $arguments): mixed
        {
            if (!Methods::tryFrom($name))
            {
                throw new InvalidArgumentException("Undefined method {$name}");
            }

            // Support named and positional arguments
            $parameters = $this->parseArguments($name, $arguments);
            return $this->sendRequest($name, $parameters);
        }

        /**
         * Parses arguments to handle both named and positional arguments.
         *
         * @param string $methodName The method name being called.
         * @param array $arguments The arguments passed to the method.
         * @return array The associative array of parameters.
         * @throws TelegramException
         * @throws InvalidArgumentException
         */
        private function parseArguments(string $methodName, array $arguments): array
        {
            $methodClass = "TgBotLib\\Methods\\" . ucfirst($methodName);

            if (!class_exists($methodClass))
            {
                throw new InvalidArgumentException("Method class $methodClass does not exist");
            }

            // Instantiate the method class
            $reflectionClass = new ReflectionClass($methodClass);
            if (!$reflectionClass->isSubclassOf(Method::class))
            {
                throw new InvalidArgumentException("$methodClass is not a valid Method class");
            }

            $requiredParameters = $methodClass::getRequiredParameters() ?? [];
            $optionalParameters = $methodClass::getOptionalParameters() ?? [];

            // Convert null to an empty array for seamless handling
            $requiredParameters = is_null($requiredParameters) ? [] : $requiredParameters;
            $optionalParameters = is_null($optionalParameters) ? [] : $optionalParameters;

            $parameters = [];

            // If arguments are provided as an associative array (named arguments)
            if (array_keys($arguments) !== range(0, count($arguments) - 1))
            {
                $parameters = $arguments;
            }
            else
            {
                // Handle positional arguments
                $paramKeys = array_merge(array_keys($requiredParameters), array_keys($optionalParameters));
                foreach ($arguments as $index => $arg)
                {
                    if (isset($paramKeys[$index]))
                    {
                        $parameters[$paramKeys[$index]] = $arg;
                    }
                }
            }

            // Validate required parameters
            foreach ($requiredParameters as $param)
            {
                if (!isset($parameters[$param]))
                {
                    throw new InvalidArgumentException("Required parameter '{$param}' is missing");
                }
            }

            return $parameters;
        }
    }