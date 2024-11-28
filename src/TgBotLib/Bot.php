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
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\InputMedia;
    use TgBotLib\Objects\InputPollOption;
    use TgBotLib\Objects\LinkPreviewOptions;
    use TgBotLib\Objects\MenuButton;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\MessageId;
    use TgBotLib\Objects\ReactionType;
    use TgBotLib\Objects\ReplyKeyboardMarkup;
    use TgBotLib\Objects\ReplyKeyboardRemove;
    use TgBotLib\Objects\ReplyParameters;
    use TgBotLib\Objects\Stickers\Sticker;
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