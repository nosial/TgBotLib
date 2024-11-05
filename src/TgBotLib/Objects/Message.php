<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Games\Game;
    use TgBotLib\Objects\Passport\PassportData;
    use TgBotLib\Objects\Payments\Invoice;
    use TgBotLib\Objects\Payments\RefundedPayment;
    use TgBotLib\Objects\Payments\SuccessfulPayment;
    use TgBotLib\Objects\Stickers\Sticker;

    class Message extends MaybeInaccessibleMessage implements ObjectTypeInterface
    {
        private int $message_id;
        private ?int $message_thread_id;
        private ?User $from;
        private ?Chat $sender_chat;
        private ?int $sender_boost_count;
        private ?User $sender_business_bot;
        private ?string $business_connection_id;
        private ?Chat $chat;
        private ?MessageOrigin $forward_origin;
        private bool $is_topic_message;
        private bool $is_automatic_forward;
        private ?Message $reply_to_message;
        private ?ExternalReplyInfo $external_reply;
        private ?TextQuote $quote;
        private ?Story $reply_to_story;
        private ?User $via_bot;
        private ?int $edit_date;
        private bool $has_protected_content;
        private bool $is_from_offline;
        private ?string $media_group_id;
        private ?string $author_signature;
        private ?string $text;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $entities;
        private ?LinkPreviewOptions $link_preview_options;
        private ?string $effect_id;
        private ?Animation $animation;
        private ?Audio $audio;
        private ?Document $document;
        private ?PaidMediaInfo $paid_media;
        /**
         * @var PhotoSize[]|null
         */
        private ?array $photo;
        private ?Sticker $sticker;
        private ?Story $story;
        private ?Video $video;
        private ?VideoNote $video_note;
        private ?Voice $voice;
        private ?string $caption;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $caption_entities;
        private bool $show_caption_above_media;
        private bool $has_media_spoiler;
        private ?Contact $contact;
        private ?Dice $dice;
        private ?Game $game;
        private ?Poll $poll;
        private ?Venue $venue;
        private ?Location $location;
        /**
         * @var User[]|null
         */
        private ?array $new_chat_members;
        private ?User $left_chat_member;
        private ?string $new_chat_title;
        /**
         * @var PhotoSize[]|null
         */
        private ?array $new_chat_photo;
        private bool $delete_chat_photo;
        private bool $group_chat_created;
        private bool $supergroup_chat_created;
        private bool $channel_chat_created;
        private ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed;
        private ?int $migrate_to_chat_id;
        private ?int $migrate_from_chat_id;
        private ?MaybeInaccessibleMessage $pinned_message;
        private ?Invoice $invoice;
        private ?SuccessfulPayment $successful_payment;
        private ?RefundedPayment $refunded_payment;
        private ?UsersShared $users_shared;
        private ?ChatShared $chat_shared;
        private ?string $connected_website;
        private ?WriteAccessAllowed $write_access_allowed;
        private ?PassportData $passport_data;
        private ?ProximityAlertTriggered $proximity_alert_triggered;
        private ?ChatBoostAdded $boost_added;
        private ?ChatBackground $chat_background_set;
        private ?ForumTopicCreated $forum_topic_created;
        private ?ForumTopicEdited $forum_topic_edited;
        private ?ForumTopicClosed $forum_topic_closed;
        private ?ForumTopicReopened $forum_topic_reopened;
        private ?GeneralForumTopicHidden $general_forum_topic_hidden;
        private ?GeneralForumTopicUnhidden $general_forum_topic_unhidden;
        private ?GiveawayCreated $giveaway_created;
        private ?Giveaway $giveaway;
        private ?GiveawayWinners $giveaway_winners;
        private ?GiveawayCompleted $giveaway_completed;
        private ?VideoChatScheduled $video_chat_scheduled;
        private ?VideoChatStarted $video_chat_started;
        private ?VideoChatEnded $video_chat_ended;
        private ?VideoChatParticipantsInvited $video_chat_participants_invited;
        private ?WebAppData $web_app_data;
        private ?InlineKeyboardMarkup $reply_markup;

        /**
         * Unique message identifier inside this chat
         *
         * @return int
         */
        public function getMessageId(): int
        {
            return $this->message_id;
        }

        /**
         * Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
         *
         * @return int|null
         */
        public function getMessageThreadId(): ?int
        {
            return $this->message_thread_id;
        }

        /**
         * Optional. Sender of the message; may be empty for messages sent to channels. For backward compatibility,
         * if the message was sent on behalf of a chat, the field contains a fake sender user in non-channel chats
         *
         * @return User|null
         */
        public function getFrom(): ?User
        {
            return $this->from;
        }

        /**
         * Optional. Sender of the message when sent on behalf of a chat. For example, the supergroup itself for
         * messages sent by its anonymous administrators or a linked channel for messages automatically forwarded to
         * the channel's discussion group. For backward compatibility, if the message was sent on behalf of a chat,
         * the field from contains a fake sender user in non-channel chats.
         *
         * @return Chat|null
         */
        public function getSenderChat(): ?Chat
        {
            return $this->sender_chat;
        }

        /**
         * Optional. If the sender of the message boosted the chat, the number of boosts added by the user
         *
         * @return int|null
         */
        public function getSenderBoostCount(): ?int
        {
            return $this->sender_boost_count;
        }

        /**
         * Optional. The bot that actually sent the message on behalf of the business account. Available only for
         * outgoing messages sent on behalf of the connected business account.
         *
         * @return User|null
         */
        public function getSenderBusinessBot(): ?User
        {
            return $this->sender_business_bot;
        }

        /**
         * Optional. Unique identifier of the business connection from which the message was received. If non-empty,
         * the message belongs to a chat of the corresponding business account that is independent from any potential
         * bot chat which might share the same identifier.
         *
         * @return string|null
         */
        public function getBusinessConnectionId(): ?string
        {
            return $this->business_connection_id;
        }

        /**
         * Chat the message belongs to
         *
         * @return Chat|null
         */
        public function getChat(): ?Chat
        {
            return $this->chat;
        }

        /**
         * Optional. Information about the original message for forwarded messages
         *
         * @return MessageOrigin|null
         */
        public function getForwardOrigin(): ?MessageOrigin
        {
            return $this->forward_origin;
        }

        /**
         * Optional. True, if the message is sent to a forum topic
         *
         * @return bool
         */
        public function isTopicMessage(): bool
        {
            return $this->is_topic_message;
        }

        /**
         * Optional. True, if the message is a channel post that was automatically forwarded to the
         * connected discussion group
         *
         * @return bool
         */
        public function isAutomaticForward(): bool
        {
            return $this->is_automatic_forward;
        }

        /**
         * Optional. For replies in the same chat and message thread, the original message. Note that the Message
         * object in this field will not contain further reply_to_message fields even if it itself is a reply.
         *
         * @return Message|null
         */
        public function getReplyToMessage(): ?Message
        {
            return $this->reply_to_message;
        }

        /**
         * Optional. Information about the message that is being replied to, which may come from another
         * chat or forum topic
         *
         * @return ExternalReplyInfo|null
         */
        public function getExternalReply(): ?ExternalReplyInfo
        {
            return $this->external_reply;
        }

        /**
         * Optional. For replies that quote part of the original message, the quoted part of the message
         *
         * @return TextQuote|null
         */
        public function getQuote(): ?TextQuote
        {
            return $this->quote;
        }

        /**
         * Optional. For replies to a story, the original story
         *
         * @return Story|null
         */
        public function getReplyToStory(): ?Story
        {
            return $this->reply_to_story;
        }

        /**
         * Optional. Bot through which the message was sent
         *
         * @return User|null
         */
        public function getViaBot(): ?User
        {
            return $this->via_bot;
        }

        /**
         * Optional. Date the message was last edited in Unix time
         *
         * @return int|null
         */
        public function getEditDate(): ?int
        {
            return $this->edit_date;
        }

        /**
         * Optional. True, if the message can't be forwarded
         *
         * @return bool
         */
        public function isHasProtectedContent(): bool
        {
            return $this->has_protected_content;
        }

        /**
         * Optional. True, if the message was sent by an implicit action, for example,
         * as an away or a greeting business message, or as a scheduled message
         *
         * @return bool
         */
        public function isIsFromOffline(): bool
        {
            return $this->is_from_offline;
        }

        /**
         * Optional. The unique identifier of a media message group this message belongs to
         *
         * @return string|null
         */
        public function getMediaGroupId(): ?string
        {
            return $this->media_group_id;
        }

        /**
         * Optional. Signature of the post author for messages in channels, or the custom title of an anonymous
         * group administrator
         *
         * @return string|null
         */
        public function getAuthorSignature(): ?string
        {
            return $this->author_signature;
        }

        /**
         * Optional. For text messages, the actual UTF-8 text of the message
         *
         * @param bool $includeCommand
         * @return string|null
         */
        public function getText(bool $includeCommand=true): ?string
        {
            if($includeCommand)
            {
                return $this->text;
            }

            if($this->text === null)
            {
                return null;
            }

            if(preg_match('/^\/([a-zA-Z0-9_]+)(?:@[a-zA-Z0-9_]+)?/', $this->text, $matches))
            {
                return str_replace($matches[0], '', $this->text);
            }

            return $this->text;
        }

        /**
         * Optional. For text messages, special entities like usernames,
         * URLs, bot commands, etc. that appear in the text
         *
         * @return MessageEntity[]|null
         */
        public function getEntities(): ?array
        {
            return $this->entities;
        }

        /**
         * Optional. Options used for link preview generation for the message,
         * if it is a text message and link preview options were changed
         *
         * @return LinkPreviewOptions|null
         */
        public function getLinkPreviewOptions(): ?LinkPreviewOptions
        {
            return $this->link_preview_options;
        }

        /**
         * Optional. Unique identifier of the message effect added to the message
         *
         * @return string|null
         */
        public function getEffectId(): ?string
        {
            return $this->effect_id;
        }

        /**
         * Optional. Message is an animation, information about the animation. For backward compatibility,
         * when this field is set, the document field will also be set
         *
         * @return Animation|null
         */
        public function getAnimation(): ?Animation
        {
            return $this->animation;
        }

        /**
         * Optional. Message is an audio file, information about the file
         *
         * @return Audio|null
         */
        public function getAudio(): ?Audio
        {
            return $this->audio;
        }

        /**
         * Optional. Message is a general file, information about the file
         *
         * @return Document|null
         */
        public function getDocument(): ?Document
        {
            return $this->document;
        }

        /**
         * Optional. Message contains paid media; information about the paid media
         *
         * @return PaidMediaInfo|null
         */
        public function getPaidMedia(): ?PaidMediaInfo
        {
            return $this->paid_media;
        }

        /**
         * Optional. Message is a photo, available sizes of the photo
         *
         * @return PhotoSize[]|null
         */
        public function getPhoto(): ?array
        {
            return $this->photo;
        }

        /**
         * Optional. Message is a sticker, information about the sticker
         *
         * @return Sticker|null
         */
        public function getSticker(): ?Sticker
        {
            return $this->sticker;
        }

        /**
         * Optional. Message is a forwarded story
         *
         * @return Story|null
         */
        public function getStory(): ?Story
        {
            return $this->story;
        }

        /**
         * Optional. Message is a video, information about the video
         *
         * @return Video|null
         */
        public function getVideo(): ?Video
        {
            return $this->video;
        }

        /**
         * Optional. Message is a video note, information about the video message
         *
         * @return VideoNote|null
         */
        public function getVideoNote(): ?VideoNote
        {
            return $this->video_note;
        }

        /**
         * Optional. Message is a voice message, information about the file
         *
         * @return Voice|null
         */
        public function getVoice(): ?Voice
        {
            return $this->voice;
        }

        /**
         * Optional. Caption for the animation, audio, document, paid media, photo, video or voice
         *
         * @param bool $includeCommand
         * @return string|null
         */
        public function getCaption(bool $includeCommand=false): ?string
        {
            if($includeCommand)
            {
                return $this->caption;
            }

            if($this->caption === null)
            {
                return null;
            }

            if(preg_match('/^\/([a-zA-Z0-9_]+)(?:@[a-zA-Z0-9_]+)?/', $this->caption, $matches))
            {
                return str_replace($matches[0], '', $this->caption);
            }

            return $this->caption;
        }

        /**
         * Optional. For messages with a caption, special entities like usernames,
         * URLs, bot commands, etc. that appear in the caption
         *
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
        }

        /**
         * Optional. True, if the caption must be shown above the message media
         *
         * @return bool
         */
        public function isShowCaptionAboveMedia(): bool
        {
            return $this->show_caption_above_media;
        }

        /**
         * Optional. True, if the message media is covered by a spoiler animation
         *
         * @return bool
         */
        public function isHasMediaSpoiler(): bool
        {
            return $this->has_media_spoiler;
        }

        /**
         * Optional. Message is a shared contact, information about the contact
         *
         * @return Contact|null
         */
        public function getContact(): ?Contact
        {
            return $this->contact;
        }

        /**
         * Optional. Message is a dice with random value
         *
         * @return Dice|null
         */
        public function getDice(): ?Dice
        {
            return $this->dice;
        }

        /**
         * Optional. Message is a game, information about the game
         *
         * @see https://core.telegram.org/bots/api#games
         * @return Game|null
         */
        public function getGame(): ?Game
        {
            return $this->game;
        }

        /**
         * Optional. Message is a native poll, information about the poll
         *
         * @return Poll|null
         */
        public function getPoll(): ?Poll
        {
            return $this->poll;
        }

        /**
         * Optional. Message is a venue, information about the venue. For backward compatibility,
         * when this field is set, the location field will also be set
         *
         * @return Venue|null
         */
        public function getVenue(): ?Venue
        {
            return $this->venue;
        }

        /**
         * Optional. Message is a shared location, information about the location
         *
         * @return Location|null
         */
        public function getLocation(): ?Location
        {
            return $this->location;
        }

        /**
         * Optional. New members that were added to the group or supergroup and information about them
         * (the bot itself may be one of these members)
         *
         * @return User[]|null
         */
        public function getNewChatMembers(): ?array
        {
            return $this->new_chat_members;
        }

        /**
         * Optional. A member was removed from the group, information about them (this member may be the bot itself)
         *
         * @return User|null
         */
        public function getLeftChatMember(): ?User
        {
            return $this->left_chat_member;
        }

        /**
         * Optional. A chat title was changed to this value
         *
         * @return string|null
         */
        public function getNewChatTitle(): ?string
        {
            return $this->new_chat_title;
        }

        /**
         * Optional. A chat photo was change to this value
         *
         * @return PhotoSize[]|null
         */
        public function getNewChatPhoto(): ?array
        {
            return $this->new_chat_photo;
        }

        /**
         * Optional. Service message: the chat photo was deleted
         *
         * @return bool
         */
        public function isDeleteChatPhoto(): bool
        {
            return $this->delete_chat_photo;
        }

        /**
         * Optional. Service message: the group has been created
         *
         * @return bool
         */
        public function isGroupChatCreated(): bool
        {
            return $this->group_chat_created;
        }

        /**
         * Optional. Service message: the supergroup has been created. This field can't be received in a message coming
         * through updates, because bot can't be a member of a supergroup when it is created. It can only be found in
         * reply_to_message if someone replies to a very first message in a directly created supergroup.
         *
         * @return bool
         */
        public function isSupergroupChatCreated(): bool
        {
            return $this->supergroup_chat_created;
        }

        /**
         * Optional. Service message: the channel has been created. This field can't be received in a message coming
         * through updates, because bot can't be a member of a channel when it is created. It can only be found in
         * reply_to_message if someone replies to a very first message in a channel.
         *
         * @return bool
         */
        public function isChannelChatCreated(): bool
        {
            return $this->channel_chat_created;
        }

        /**
         * Optional. Service message: auto-delete timer settings changed in the chat
         *
         * @return MessageAutoDeleteTimerChanged|null
         */
        public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
        {
            return $this->message_auto_delete_timer_changed;
        }

        /**
         * Optional. The group has been migrated to a supergroup with the specified identifier. This number may have
         * more than 32 significant bits and some programming languages may have difficulty/silent defects in
         * interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
         * float type are safe for storing this identifier.
         *
         * @return int|null
         */
        public function getMigrateToChatId(): ?int
        {
            return $this->migrate_to_chat_id;
        }

        /**
         * Optional. The supergroup has been migrated from a group with the specified identifier. This number may
         * have more than 32 significant bits and some programming languages may have difficulty/silent defects in
         * interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
         * float type are safe for storing this identifier.
         *
         * @return int|null
         */
        public function getMigrateFromChatId(): ?int
        {
            return $this->migrate_from_chat_id;
        }

        /**
         * Optional. Specified message was pinned. Note that the Message object in this field will not contain further
         * reply_to_message fields even if it itself is a reply.
         *
         * @return MaybeInaccessibleMessage|null
         */
        public function getPinnedMessage(): ?MaybeInaccessibleMessage
        {
            return $this->pinned_message;
        }

        /**
         * Optional. Message is an invoice for a payment, information about the invoice
         *
         * @see https://core.telegram.org/bots/api#payments
         * @return Invoice|null
         */
        public function getInvoice(): ?Invoice
        {
            return $this->invoice;
        }

        /**
         * Optional. Message is a service message about a successful payment, information about the payment
         *
         * @see https://core.telegram.org/bots/api#payments
         * @return SuccessfulPayment|null
         */
        public function getSuccessfulPayment(): ?SuccessfulPayment
        {
            return $this->successful_payment;
        }

        /**
         * Optional. Message is a service message about a refunded payment, information about the payment
         *
         * @see https://core.telegram.org/bots/api#payments
         * @return RefundedPayment|null
         */
        public function getRefundedPayment(): ?RefundedPayment
        {
            return $this->refunded_payment;
        }

        /**
         * Optional. Service message: users were shared with the bot
         *
         * @return UsersShared|null
         */
        public function getUsersShared(): ?UsersShared
        {
            return $this->users_shared;
        }

        /**
         * Optional. Service message: a chat was shared with the bot
         *
         * @return ChatShared|null
         */
        public function getChatShared(): ?ChatShared
        {
            return $this->chat_shared;
        }

        /**
         * Optional. The domain name of the website on which the user has logged in.
         *
         * @see https://core.telegram.org/widgets/login
         * @return string|null
         */
        public function getConnectedWebsite(): ?string
        {
            return $this->connected_website;
        }

        /**
         * Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or
         * side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the
         * method requestWriteAccess
         *
         * @return WriteAccessAllowed|null
         */
        public function getWriteAccessAllowed(): ?WriteAccessAllowed
        {
            return $this->write_access_allowed;
        }

        /**
         * Optional. Telegram Passport data
         *
         * @return PassportData|null
         */
        public function getPassportData(): ?PassportData
        {
            return $this->passport_data;
        }

        /**
         * Optional. Service message. A user in the chat triggered another user's proximity alert
         * while sharing Live Location.
         *
         * @return ProximityAlertTriggered|null
         */
        public function getProximityAlertTriggered(): ?ProximityAlertTriggered
        {
            return $this->proximity_alert_triggered;
        }

        /**
         * Optional. Service message: user boosted the chat
         *
         * @return ChatBoostAdded|null
         */
        public function getBoostAdded(): ?ChatBoostAdded
        {
            return $this->boost_added;
        }

        /**
         * Optional. Service message: chat background set
         *
         * @return ChatBackground|null
         */
        public function getChatBackgroundSet(): ?ChatBackground
        {
            return $this->chat_background_set;
        }

        /**
         * Optional. Service message: forum topic created
         *
         * @return ForumTopicCreated|null
         */
        public function getForumTopicCreated(): ?ForumTopicCreated
        {
            return $this->forum_topic_created;
        }

        /**
         * Optional. Service message: forum topic edited
         *
         * @return ForumTopicEdited|null
         */
        public function getForumTopicEdited(): ?ForumTopicEdited
        {
            return $this->forum_topic_edited;
        }

        /**
         * Optional. Service message: forum topic closed
         *
         * @return ForumTopicClosed|null
         */
        public function getForumTopicClosed(): ?ForumTopicClosed
        {
            return $this->forum_topic_closed;
        }

        /**
         * Optional. Service message: forum topic reopened
         *
         * @return ForumTopicReopened|null
         */
        public function getForumTopicReopened(): ?ForumTopicReopened
        {
            return $this->forum_topic_reopened;
        }

        /**
         * Optional. Service message: the 'General' forum topic hidden
         *
         * @return GeneralForumTopicHidden|null
         */
        public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
        {
            return $this->general_forum_topic_hidden;
        }

        /**
         * Optional. Service message: the 'General' forum topic unhidden
         *
         * @return GeneralForumTopicUnhidden|null
         */
        public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
        {
            return $this->general_forum_topic_unhidden;
        }

        /**
         * Optional. Service message: a scheduled giveaway was created
         *
         * @return GiveawayCreated|null
         */
        public function getGiveawayCreated(): ?GiveawayCreated
        {
            return $this->giveaway_created;
        }

        /**
         * Optional. The message is a scheduled giveaway message
         *
         * @return Giveaway|null
         */
        public function getGiveaway(): ?Giveaway
        {
            return $this->giveaway;
        }

        /**
         * Optional. A giveaway with public winners was completed
         *
         * @return GiveawayWinners|null
         */
        public function getGiveawayWinners(): ?GiveawayWinners
        {
            return $this->giveaway_winners;
        }

        /**
         * Optional. Service message: a giveaway without public winners was completed
         *
         * @return GiveawayCompleted|null
         */
        public function getGiveawayCompleted(): ?GiveawayCompleted
        {
            return $this->giveaway_completed;
        }

        /**
         * Optional. Service message: video chat scheduled
         *
         * @return VideoChatScheduled|null
         */
        public function getVideoChatScheduled(): ?VideoChatScheduled
        {
            return $this->video_chat_scheduled;
        }

        /**
         * Optional. Service message: video chat started
         *
         * @return VideoChatStarted|null
         */
        public function getVideoChatStarted(): ?VideoChatStarted
        {
            return $this->video_chat_started;
        }

        /**
         * Optional. Service message: video chat ended
         *
         * @return VideoChatEnded|null
         */
        public function getVideoChatEnded(): ?VideoChatEnded
        {
            return $this->video_chat_ended;
        }

        /**
         * Optional. Service message: new participants invited to a video chat
         *
         * @return VideoChatParticipantsInvited|null
         */
        public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
        {
            return $this->video_chat_participants_invited;
        }

        /**
         * Optional. Service message: data sent by a Web App
         *
         * @return WebAppData|null
         */
        public function getWebAppData(): ?WebAppData
        {
            return $this->web_app_data;
        }

        /**
         * Optional. Inline keyboard attached to the message.
         * login_url buttons are represented as ordinary url buttons.
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
        }

        /**
         * Retrieves any available text, prioritizing 'text' over 'caption'.
         *
         * @param bool $includeCommand
         * @return string|null
         */
        public function getAnyText(bool $includeCommand=false): ?string
        {
            return $this->getText($includeCommand) ?? $this->getCaption($includeCommand);
        }

        /**
         * Retrieves the command from the text if it exists.
         *
         * @return string|null
         */
        public function getCommand(): ?string
        {
            if ($this->getAnyText() === null)
            {
                return null;
            }

            $text = trim($this->getAnyText());

            if (!str_starts_with($text, '/'))
            {
                return null;
            }

            if (preg_match('/^\/([a-zA-Z0-9_]+)(?:@[a-zA-Z0-9_]+)?/', $text, $matches))
            {
                return $matches[1];
            }

            return null;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return array_filter([
                'message_id' => $this->message_id,
                'message_thread_id' => $this->message_thread_id,
                'from' => $this->from?->toArray(),
                'sender_chat' => $this->sender_chat?->toArray(),
                'sender_boost_count' => $this->sender_boost_count,
                'sender_business_bot' => $this->sender_business_bot?->toArray(),
                'date' => $this->date,
                'business_connection_id' => $this->business_connection_id,
                'chat' => $this->chat?->toArray(),
                'forward_origin' => $this->forward_origin?->toArray(),
                'is_topic_message' => $this->is_topic_message,
                'is_automatic_forward' => $this->is_automatic_forward,
                'reply_to_message' => $this->reply_to_message?->toArray(),
                'external_reply' => $this->external_reply?->toArray(),
                'quote' => $this->quote?->toArray(),
                'reply_to_story' => $this->reply_to_story?->toArray(),
                'via_bot' => $this->via_bot?->toArray(),
                'edit_date' => $this->edit_date,
                'has_protected_content' => $this->has_protected_content,
                'is_from_offline' => $this->is_from_offline,
                'media_group_id' => $this->media_group_id,
                'author_signature' => $this->author_signature,
                'text' => $this->text,
                'entities' => $this->entities? array_map(fn($item) => $item->toArray(), $this->entities) : null,
                'link_preview_options' => $this->link_preview_options?->toArray(),
                'effect_id' => $this->effect_id,
                'animation' => $this->animation?->toArray(),
                'audio' => $this->audio?->toArray(),
                'document' => $this->document?->toArray(),
                'paid_media' => $this->paid_media?->toArray(),
                'photo' => $this->photo? array_map(fn($item) => $item->toArray(), $this->photo) : null,
                'sticker' => $this->sticker?->toArray(),
                'story' => $this->story?->toArray(),
                'video' => $this->video?->toArray(),
                'video_note' => $this->video_note?->toArray(),
                'voice' => $this->voice?->toArray(),
                'caption' => $this->caption,
                'caption_entities' => $this->caption_entities? array_map(fn($item) => $item->toArray(), $this->caption_entities) : null,
                'show_caption_above_media' => $this->show_caption_above_media,
                'has_media_spoiler' => $this->has_media_spoiler,
                'contact' => $this->contact?->toArray(),
                'dice' => $this->dice?->toArray(),
                'game' => $this->game?->toArray(),
                'poll' => $this->poll?->toArray(),
                'venue' => $this->venue?->toArray(),
                'location' => $this->location?->toArray(),
                'new_chat_members' => $this->new_chat_members? array_map(fn($item) => $item->toArray(), $this->new_chat_members) : null,
                'left_chat_member' => $this->left_chat_member?->toArray(),
                'new_chat_title' => $this->new_chat_title,
                'new_chat_photo' => $this->new_chat_photo? array_map(fn($item) => $item->toArray(), $this->new_chat_photo) : null,
                'delete_chat_photo' => $this->delete_chat_photo,
                'group_chat_created' => $this->group_chat_created,
                'supergroup_chat_created' => $this->supergroup_chat_created,
                'channel_chat_created' => $this->channel_chat_created,
                'message_auto_delete_timer_changed' => $this->message_auto_delete_timer_changed?->toArray(),
                'migrate_to_chat_id' => $this->migrate_to_chat_id,
                'migrate_from_chat_id' => $this->migrate_from_chat_id,
                'pinned_message' => $this->pinned_message?->toArray(),
                'invoice' => $this->invoice?->toArray(),
                'successful_payment' => $this->successful_payment?->toArray(),
                'refunded_payment' => $this->refunded_payment?->toArray(),
                'users_shared' => $this->users_shared?->toArray(),
                'chat_shared' => $this->chat_shared?->toArray(),
                'connected_website' => $this->connected_website,
                'write_access_allowed' => $this->write_access_allowed?->toArray(),
                'passport_data' => $this->passport_data?->toArray(),
                'proximity_alert_triggered' => $this->proximity_alert_triggered?->toArray(),
                'boost_added' => $this->boost_added?->toArray(),
                'chat_background_set' => $this->chat_background_set?->toArray(),
                'forum_topic_created' => $this->forum_topic_created?->toArray(),
                'forum_topic_edited' => $this->forum_topic_edited?->toArray(),
                'forum_topic_closed' => $this->forum_topic_closed?->toArray(),
                'forum_topic_reopened' => $this->forum_topic_reopened?->toArray(),
                'general_forum_topic_hidden' => $this->general_forum_topic_hidden?->toArray(),
                'general_forum_topic_unhidden' => $this->general_forum_topic_unhidden?->toArray(),
                'giveaway_created' => $this->giveaway_created?->toArray(),
                'giveaway' => $this->giveaway?->toArray(),
                'giveaway_winners' => $this->giveaway_winners?->toArray(),
                'giveaway_completed' => $this->giveaway_completed?->toArray(),
                'video_chat_scheduled' => $this->video_chat_scheduled?->toArray(),
                'video_chat_started' => $this->video_chat_started?->toArray(),
                'video_chat_ended' => $this->video_chat_ended?->toArray(),
                'video_chat_participants_invited' => $this->video_chat_participants_invited?->toArray(),
                'web_app_data' => $this->web_app_data?->toArray(),
                'reply_markup' => $this->reply_markup?->toArray()
            ]);
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Message
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->message_id = $data['message_id'];
            $object->message_thread_id = $data['message_thread_id'] ?? null;
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->sender_chat = isset($data['sender_chat']) ? Chat::fromArray($data['sender_chat']) : null;
            $object->sender_boost_count = $data['sender_boost_count'] ?? null;
            $object->sender_business_bot = isset($data['sender_business_bot']) ? User::fromArray($data['sender_business_bot']) : null;
            $object->date = $data['date'] ?? null;
            $object->business_connection_id = $data['business_connection_id'] ?? null;
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
            $object->forward_origin = isset($data['forward_origin']) ? MessageOrigin::fromArray($data['forward_origin']) : null;
            $object->is_topic_message = $data['is_topic_message'] ?? false;
            $object->is_automatic_forward = $data['is_automatic_forward'] ?? false;
            $object->reply_to_message = isset($data['reply_to_message']) ? Message::fromArray($data['reply_to_message']) : null;
            $object->external_reply = isset($data['external_reply']) ? ExternalReplyInfo::fromArray($data['external_reply']) : null;
            $object->quote = isset($data['quote']) ? TextQuote::fromArray($data['quote']) : null;
            $object->reply_to_story = isset($data['reply_to_story']) ? Story::fromArray($data['reply_to_story']) : null;
            $object->via_bot = isset($data['via_bot']) ? User::fromArray($data['via_bot']) : null;
            $object->edit_date = $data['edit_date'] ?? null;
            $object->has_protected_content = $data['has_protected_content'] ?? false;
            $object->is_from_offline = $data['is_from_offline'] ?? false;
            $object->media_group_id = $data['media_group_id'] ?? null;
            $object->author_signature = $data['author_signature'] ?? null;
            $object->text = $data['text'] ?? null;
            $object->entities = isset($data['entities']) ? array_map(fn($item) => MessageEntity::fromArray($item), $data['entities']) : null;
            $object->link_preview_options = isset($data['link_preview_options']) ? LinkPreviewOptions::fromArray($data['link_preview_options']) : null;
            $object->effect_id = $data['effect_id'] ?? null;
            $object->animation = isset($data['animation']) ? Animation::fromArray($data['animation']) : null;
            $object->audio = isset($data['audio']) ? Audio::fromArray($data['audio']) : null;
            $object->document = isset($data['document']) ? Document::fromArray($data['document']) : null;
            $object->paid_media = isset($data['paid_media']) ? PaidMedia::fromArray($data['paid_media']) : null;
            $object->photo = isset($data['photo']) ? array_map(fn($item) => PhotoSize::fromArray($item), $data['photo']) : null;
            $object->sticker = isset($data['sticker']) ? Sticker::fromArray($data['sticker']) : null;
            $object->story = isset($data['story']) ? Story::fromArray($data['story']) : null;
            $object->video = isset($data['video']) ? Video::fromArray($data['video']) : null;
            $object->video_note = isset($data['video_note']) ? VideoNote::fromArray($data['video_note']) : null;
            $object->voice = isset($data['voice']) ? Voice::fromArray($data['voice']) : null;
            $object->caption = $data['caption'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) ? array_map(fn($item) => MessageEntity::fromArray($item), $data['caption_entities']) : null;
            $object->show_caption_above_media = $data['show_caption_above_media'] ?? false;
            $object->has_media_spoiler = $data['has_media_spoiler'] ?? false;
            $object->contact = isset($data['contact']) ? Contact::fromArray($data['contact']) : null;
            $object->dice = isset($data['dice']) ? Dice::fromArray($data['dice']) : null;
            $object->game = isset($data['game']) ? Game::fromArray($data['game']) : null;
            $object->poll = isset($data['poll']) ? Poll::fromArray($data['poll']) : null;
            $object->venue = isset($data['venue']) ? Venue::fromArray($data['venue']) : null;
            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;
            $object->new_chat_members = isset($data['new_chat_members']) ? array_map(fn($item) => User::fromArray($item), $data['new_chat_members']) : null;
            $object->left_chat_member = isset($data['left_chat_member']) ? User::fromArray($data['left_chat_member']) : null;
            $object->new_chat_title = $data['new_chat_title'] ?? null;
            $object->new_chat_photo = isset($data['new_chat_photo']) ? array_map(fn($item) => PhotoSize::fromArray($data), $data['new_chat_photo']): null;
            $object->delete_chat_photo = $data['delete_chat_photo'] ?? false;
            $object->group_chat_created = $data['group_chat_created'] ?? false;
            $object->supergroup_chat_created = $data['supergroup_chat_created'] ?? false;
            $object->channel_chat_created = $data['channel_chat_created'] ?? false;
            $object->message_auto_delete_timer_changed = isset($data['message_auto_delete_timer_changed']) ? MessageAutoDeleteTimerChanged::fromArray($data['message_auto_delete_timer_changed']) : null;
            $object->migrate_to_chat_id = $data['migrate_to_chat_id'] ?? null;
            $object->migrate_from_chat_id = $data['migrate_from_chat_id'] ?? null;
            $object->pinned_message = isset($data['pinned_message']) ? MaybeInaccessibleMessage::fromArray($data['pinned_message']) : null;
            $object->invoice = isset($data['invoice']) ? Invoice::fromArray($data['invoice']) : null;
            $object->successful_payment = isset($data['successful_payment']) ? SuccessfulPayment::fromArray($data['successful_payment']) : null;
            $object->refunded_payment = isset($data['refunded_payment']) ? RefundedPayment::fromArray($data['refunded_payment']) : null;
            $object->users_shared = isset($data['users_shared']) ? UsersShared::fromArray($data['users_shared']) : null;
            $object->chat_shared = isset($data['chat_shared']) ? ChatShared::fromArray($data['chat_shared']) : null;
            $object->connected_website = $data['connected_website'] ?? null;
            $object->write_access_allowed = isset($data['write_access_allowed']) ? WriteAccessAllowed::fromArray($data['write_access_allowed']) : null;
            $object->passport_data = isset($data['passport_data']) ? PassportData::fromArray($data['passport_data']) : null;
            $object->proximity_alert_triggered = isset($data['proximity_alert_triggered']) ? ProximityAlertTriggered::fromArray($data['proximity_alert_triggered']) : null;
            $object->boost_added = isset($data['boost_added']) ? ChatBoostAdded::fromArray($data['boost_added']) : null;
            $object->chat_background_set = isset($data['chat_background_set']) ? ChatBackground::fromArray($data['chat_background_set']) : null;
            $object->forum_topic_created = isset($data['forum_topic_created']) ? ForumTopicCreated::fromArray($data['forum_topic_created']) : null;
            $object->forum_topic_edited = isset($data['forum_topic_edited']) ? ForumTopicEdited::fromArray($data['forum_topic_edited']) : null;
            $object->forum_topic_closed = isset($data['forum_topic_closed']) ? ForumTopicClosed::fromArray($data['forum_topic_closed']) : null;
            $object->forum_topic_reopened = isset($data['forum_topic_reopened']) ? ForumTopicReopened::fromArray($data['forum_topic_reopened']) : null;
            $object->general_forum_topic_hidden = isset($data['general_forum_topic_hidden']) ? GeneralForumTopicHidden::fromArray($data['general_forum_topic_hidden']) : null;
            $object->general_forum_topic_unhidden = isset($data['general_forum_topic_unhidden']) ? GeneralForumTopicUnhidden::fromArray($data['general_forum_topic_unhidden']) : null;
            $object->giveaway_created = isset($data['giveaway_created']) ? GiveawayCreated::fromArray($data['giveaway_created']) : null;
            $object->giveaway = isset($data['giveaway']) ? GiveawayCreated::fromArray($data['giveaway']) : null;
            $object->giveaway_winners = isset($data['giveaway_winners']) ? GiveawayWinners::fromArray($data['giveaway_winners']) : null;
            $object->giveaway_completed = isset($data['giveaway_completed']) ? GiveawayCompleted::fromArray($data['giveaway_completed']) : null;
            $object->video_chat_scheduled = isset($data['video_chat_scheduled']) ? VideoChatScheduled::fromArray($data['video_chat_scheduled']) : null;
            $object->video_chat_started = isset($data['video_chat_started']) ? VideoChatStarted::fromArray($data['video_chat_started']) : null;
            $object->video_chat_ended = isset($data['video_chat_ended']) ? VideoChatEnded::fromArray($data['video_chat_ended']) : null;
            $object->video_chat_participants_invited = isset($data['video_chat_participants_invited']) ? VideoChatParticipantsInvited::fromArray($data['video_chat_participants_invited']) : null;
            $object->web_app_data = isset($data['web_app_data']) ? WebAppData::fromArray($data['web_app_data']) : null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;

            return $object;
        }
    }