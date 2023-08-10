<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Message implements ObjectTypeInterface
    {

        /**
         * @var int|null
         */
        private $message_id;

        /**
         * @var int|null
         */
        private $message_thread_id;

        /**
         * @var User|null
         */
        private $from;

        /**
         * @var Chat|null
         */
        private $sender_chat;

        /**
         * @var int
         */
        private $date;

        /**
         * @var Chat|null
         */
        private $chat;

        /**
         * @var User|null
         */
        private $forward_from;

        /**
         * @var Chat|null
         */
        private $forward_from_chat;

        /**
         * @var int|null
         */
        private $forward_from_message_id;

        /**
         * @var string|null
         */
        private $forward_signature;

        /**
         * @var string|null
         */
        private $forward_sender_name;

        /**
         * @var int|null
         */
        private $forward_date;

        /**
         * @var bool
         */
        private $is_topic_message;

        /**
         * @var bool
         */
        private $is_automatic_forward;

        /**
         * @var Message|null
         */
        private $reply_to_message;

        /**
         * @var User|null
         */
        private $via_bot;

        /**
         * @var int|null
         */
        private $edit_date;

        /**
         * @var bool
         */
        private $has_protected_content;

        /**
         * @var string|null
         */
        private $media_group_id;

        /**
         * @var string|null
         */
        private $author_signature;

        /**
         * @var string|null
         */
        private $text;

        /**
         * @var MessageEntity[]|null
         */
        private $entities;

        /**
         * @var Animation|null
         */
        private $animation;

        /**
         * @var Audio|null
         */
        private $audio;

        /**
         * @var Document|null
         */
        private $document;

        /**
         * @var PhotoSize[]|null
         */
        private $photo;

        /**
         * @var Sticker|null
         */
        private $sticker;

        /**
         * @var Video|null
         */
        private $video;

        /**
         * @var VideoNote|null
         */
        private $video_note;

        /**
         * @var Voice|null
         */
        private $voice;

        /**
         * @var string|null
         */
        private $caption;

        /**
         * @var MessageEntity[]|null
         */
        private $caption_entities;

        /**
         * @var bool
         */
        private $has_media_spoiler;

        /**
         * @var Contact|null
         */
        private $contact;

        /**
         * @var Dice|null
         */
        private $dice;

        /**
         * @var Game|null
         */
        private $game;

        /**
         * @var Poll|null
         */
        private $poll;

        /**
         * @var Venue|null
         */
        private $venue;

        /**
         * @var Location|null
         */
        private $location;

        /**
         * @var User[]|null
         */
        private $new_chat_members;

        /**
         * @var User|null
         */
        private $left_chat_member;

        /**
         * @var string|null
         */
        private $new_chat_title;

        /**
         * @var PhotoSize[]|null
         */
        private $new_chat_photo;

        /**
         * @var bool
         */
        private $delete_chat_photo;

        /**
         * @var bool
         */
        private $group_chat_created;

        /**
         * @var bool
         */
        private $supergroup_chat_created;

        /**
         * @var bool
         */
        private $channel_chat_created;

        /**
         * @var MessageAutoDeleteTimerChanged|null
         */
        private $message_auto_delete_timer_changed;

        /**
         * @var int|null
         */
        private $migrate_to_chat_id;

        /**
         * @var int|null
         */
        private $migrate_from_chat_id;

        /**
         * @var Message|null
         */
        private $pinned_message;

        /**
         * @var Invoice|null
         */
        private $invoice;

        /**
         * @var SuccessfulPayment|null
         */
        private $successful_payment;

        /**
         * @var UserShared|null
         */
        private $user_shared;

        /**
         * @var ChatShared|null
         */
        private $chat_shared;

        /**
         * @var string|null
         */
        private $connected_website;

        /**
         * @var WriteAccessAllowed|null
         */
        private $write_access_allowed;

        /**
         * @var PassportData|null
         */
        private $passport_data;

        /**
         * @var ProximityAlertTriggered|null
         */
        private $proximity_alert_triggered;

        /**
         * @var ForumTopicCreated|null
         */
        private $forum_topic_created;

        /**
         * @var ForumTopicEdited|null
         */
        private $forum_topic_edited;

        /**
         * @var ForumTopicClosed|null
         */
        private $forum_topic_closed;

        /**
         * @var ForumTopicReopened|null
         */
        private $forum_topic_reopened;

        /**
         * @var GeneralForumTopicHidden|null
         */
        private $general_forum_topic_hidden;

        /**
         * @var GeneralForumTopicUnhidden|null
         */
        private $general_forum_topic_unhidden;

        /**
         * @var VideoChatScheduled|null
         */
        private $video_chat_scheduled;

        /**
         * @var VideoChatStarted|null
         */
        private $video_chat_started;

        /**
         * @var VideoChatEnded|null
         */
        private $video_chat_ended;

        /**
         * @var VideoChatParticipantsInvited|null
         */
        private $video_chat_participants_invited;

        /**
         * @var WebAppData|null
         */
        private $web_app_data;

        /**
         * @var InlineKeyboardMarkup|null
         */
        private $reply_markup;

        /**
         * Unique message identifier inside this chat
         *
         * @return int|null
         */
        public function getMessageId(): ?int
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
         * Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field
         * contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
         *
         * @return User|null
         */
        public function getFrom(): ?User
        {
            return $this->from;
        }

        /**
         * Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts,
         * the supergroup itself for messages from anonymous group administrators, the linked channel for messages
         * automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake
         * sender user in non-channel chats, if the message was sent on behalf of a chat.
         *
         * @return Chat|null
         */
        public function getSenderChat(): ?Chat
        {
            return $this->sender_chat;
        }

        /**
         * Date the message was sent in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * Conversation the message belongs to
         *
         * @return Chat|null
         */
        public function getChat(): ?Chat
        {
            return $this->chat;
        }

        /**
         * Optional. For forwarded messages, sender of the original message
         *
         * @return User|null
         */
        public function getForwardFrom(): ?User
        {
            return $this->forward_from;
        }

        /**
         * Optional. For messages forwarded from channels or from anonymous administrators,
         * information about the original sender chat
         *
         * @return Chat|null
         */
        public function getForwardFromChat(): ?Chat
        {
            return $this->forward_from_chat;
        }

        /**
         * Optional. For messages forwarded from channels, identifier of the original message in the channel
         *
         * @return int|null
         */
        public function getForwardFromMessageId(): ?int
        {
            return $this->forward_from_message_id;
        }

        /**
         * Optional. For forwarded messages that were originally sent in channels or by an anonymous chat
         * administrator, signature of the message sender if present
         *
         * @return string|null
         */
        public function getForwardSignature(): ?string
        {
            return $this->forward_signature;
        }

        /**
         * Optional. Sender's name for messages forwarded from users who disallow adding a link
         * to their account in forwarded messages
         *
         * @return string|null
         */
        public function getForwardSenderName(): ?string
        {
            return $this->forward_sender_name;
        }

        /**
         * Optional. For forwarded messages, date the original message was sent in Unix time
         *
         * @return int|null
         */
        public function getForwardDate(): ?int
        {
            return $this->forward_date;
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
         * Optional. True, if the message is a channel post that was automatically forwarded
         * to the connected discussion group
         *
         * @return bool
         */
        public function isAutomaticForward(): bool
        {
            return $this->is_automatic_forward;
        }

        /**
         * Optional. For replies, the original message. Note that the Message object in this field will not contain
         * further reply_to_message fields even if it itself is a reply.
         *
         * @return Message|null
         */
        public function getReplyToMessage(): ?Message
        {
            return $this->reply_to_message;
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
        public function hasProtectedContent(): bool
        {
            return $this->has_protected_content;
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
         * Optional. Signature of the post author for messages in channels,
         * or the custom title of an anonymous group administrator
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
         * @return string|null
         */
        public function getText(): ?string
        {
            return $this->text;
        }

        /**
         * Optional. For text messages, special entities like usernames, URLs, bot commands, etc.
         * that appear in the text
         *
         * @return MessageEntity[]|null
         */
        public function getEntities(): ?array
        {
            return $this->entities;
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
         * @see https://telegram.org/blog/video-messages-and-telescope
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
         * Optional. Caption for the animation, audio, document, photo, video or voice
         *
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * Optional. For messages with a caption, special entities like usernames, URLs,
         * bot commands, etc. that appear in the caption
         *
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
        }

        /**
         * Optional. True, if the message media is covered by a spoiler animation
         *
         * @return bool
         */
        public function hasMediaSpoiler(): bool
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
         * Optional. Message is a game, information about the game.
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
         * Optional. The group has been migrated to a supergroup with the specified identifier. This number may
         * have more than 32 significant bits and some programming languages may have difficulty/silent defects in
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
         * Optional. The supergroup has been migrated from a group with the specified identifier. This number may have
         * more than 32 significant bits and some programming languages may have difficulty/silent defects in
         * interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float
         * type are safe for storing this identifier.
         *
         * @return int|null
         */
        public function getMigrateFromChatId(): ?int
        {
            return $this->migrate_from_chat_id;
        }

        /**
         * Optional. Specified message was pinned. Note that the Message object in this field will not contain further
         * reply_to_message fields even if it is itself a reply.
         *
         * @return Message|null
         */
        public function getPinnedMessage(): ?Message
        {
            return $this->pinned_message;
        }

        /**
         * Optional. Message is an invoice for a payment, information about the invoice.
         *
         * @see https://core.telegram.org/bots/api#payments
         * @return Invoice|null
         */
        public function getInvoice(): ?Invoice
        {
            return $this->invoice;
        }

        /**
         * Optional. Message is a service message about a successful payment, information about the payment.
         *
         * @see https://core.telegram.org/bots/api#payments
         * @return SuccessfulPayment|null
         */
        public function getSuccessfulPayment(): ?SuccessfulPayment
        {
            return $this->successful_payment;
        }

        /**
         * Optional. Service message: a user was shared with the bot
         *
         * @return UserShared|null
         */
        public function getUserShared(): ?UserShared
        {
            return $this->user_shared;
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
         * Optional. Service message: the user allowed the bot added to the attachment menu to write messages
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
         * Optional. Service message. A user in the chat triggered another user's proximity alert while sharing
         * Live Location.
         *
         * @return ProximityAlertTriggered|null
         */
        public function getProximityAlertTriggered(): ?ProximityAlertTriggered
        {
            return $this->proximity_alert_triggered;
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
         * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
        }

        /**
         * Returns an array representation of this object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'message_id' => $this->message_id,
                'message_thread_id' => $this->message_thread_id,
                'from' => ($this->from instanceof ObjectTypeInterface) ? $this->from->toArray() : null,
                'sender_chat' => ($this->sender_chat instanceof ObjectTypeInterface) ? $this->sender_chat->toArray() : null,
                'date' => $this->date,
                'chat' => ($this->chat instanceof ObjectTypeInterface) ? $this->chat->toArray() : null,
                'forward_from' => ($this->forward_from instanceof ObjectTypeInterface) ? $this->forward_from->toArray() : null,
                'forward_from_chat' => ($this->forward_from_chat instanceof ObjectTypeInterface) ? $this->forward_from_chat->toArray() : null,
                'forward_from_message_id' => $this->forward_from_message_id,
                'forward_signature' => $this->forward_signature,
                'forward_sender_name' => $this->forward_sender_name,
                'forward_date' => $this->forward_date,
                'is_topic_message' => $this->is_topic_message,
                'is_automatic_forward' => $this->is_automatic_forward,
                'reply_to_message' => ($this->reply_to_message instanceof ObjectTypeInterface) ? $this->reply_to_message->toArray() : null,
                'via_bot' => ($this->via_bot instanceof ObjectTypeInterface) ? $this->via_bot->toArray() : null,
                'edit_date' => $this->edit_date,
                'has_protected_content' => $this->has_protected_content,
                'media_group_id' => $this->media_group_id,
                'author_signature' => $this->author_signature,
                'text' => $this->text,
                'entities' => is_array($this->entities) ? array_map(function ($entity) {
                    if ($entity instanceof ObjectTypeInterface)
                    {
                        return $entity->toArray();
                    }
                    return $entity;
                }, $this->entities) : null,
                'animation' => ($this->animation instanceof ObjectTypeInterface) ? $this->animation->toArray() : null,
                'audio' => ($this->audio instanceof ObjectTypeInterface) ? $this->audio->toArray() : null,
                'document' => ($this->document instanceof ObjectTypeInterface) ? $this->document->toArray() : null,
                'photo' => is_array($this->photo) ? array_map(function ($photo) {
                    if ($photo instanceof ObjectTypeInterface)
                    {
                        return $photo->toArray();
                    }
                    return $photo;
                }, $this->photo) : null,
                'sticker' => ($this->sticker instanceof ObjectTypeInterface) ? $this->sticker->toArray() : null,
                'video' => ($this->video instanceof ObjectTypeInterface) ? $this->video->toArray() : null,
                'video_note' => ($this->video_note instanceof ObjectTypeInterface) ? $this->video_note->toArray() : null,
                'voice' => ($this->voice instanceof ObjectTypeInterface) ? $this->voice->toArray() : null,
                'caption' => $this->caption,
                'caption_entities' => is_array($this->caption_entities) ? array_map(function ($caption_entity) {
                    if ($caption_entity instanceof ObjectTypeInterface)
                    {
                        return $caption_entity->toArray();
                    }
                    return $caption_entity;
                }, $this->caption_entities) : null,
                'has_media_spoiler' => $this->has_media_spoiler,
                'contact' => ($this->contact instanceof ObjectTypeInterface) ? $this->contact->toArray() : null,
                'dice' => ($this->dice instanceof ObjectTypeInterface) ? $this->dice->toArray() : null,
                'game' => ($this->game instanceof ObjectTypeInterface) ? $this->game->toArray() : null,
                'poll' => ($this->poll instanceof ObjectTypeInterface) ? $this->poll->toArray() : null,
                'venue' => ($this->venue instanceof ObjectTypeInterface) ? $this->venue->toArray() : null,
                'location' => ($this->location instanceof ObjectTypeInterface) ? $this->location->toArray() : null,
                'new_chat_members' => is_array($this->new_chat_members) ? array_map(function ($new_chat_member) {
                    if ($new_chat_member instanceof ObjectTypeInterface)
                    {
                        return $new_chat_member->toArray();
                    }
                    return $new_chat_member;
                }, $this->new_chat_members) : null,
                'left_chat_member' => ($this->left_chat_member instanceof ObjectTypeInterface) ? $this->left_chat_member->toArray() : null,
                'new_chat_title' => $this->new_chat_title,
                'new_chat_photo' => is_array($this->new_chat_photo) ? array_map(function ($new_chat_photo) {
                    if ($new_chat_photo instanceof ObjectTypeInterface)
                    {
                        return $new_chat_photo->toArray();
                    }
                    return $new_chat_photo;
                }, $this->new_chat_photo) : null,
                'delete_chat_photo' => $this->delete_chat_photo,
                'group_chat_created' => $this->group_chat_created,
                'supergroup_chat_created' => $this->supergroup_chat_created,
                'channel_chat_created' => $this->channel_chat_created,
                'message_auto_delete_timer_changed' => ($this->message_auto_delete_timer_changed instanceof ObjectTypeInterface) ? $this->message_auto_delete_timer_changed->toArray() : null,
                'migrate_to_chat_id' => $this->migrate_to_chat_id,
                'pinned_message' => ($this->pinned_message instanceof ObjectTypeInterface) ? $this->pinned_message->toArray() : null,
                'invoice' => ($this->invoice instanceof ObjectTypeInterface) ? $this->invoice->toArray() : null,
                'successful_payment' => ($this->successful_payment instanceof ObjectTypeInterface) ? $this->successful_payment->toArray() : null,
                'user_shared' => ($this->user_shared instanceof ObjectTypeInterface) ? $this->user_shared->toArray() : null,
                'chat_shared' => ($this->chat_shared instanceof ObjectTypeInterface) ? $this->chat_shared->toArray() : null,
                'connected_website' => $this->connected_website,
                'write_access_allowed' => ($this->write_access_allowed instanceof ObjectTypeInterface) ? $this->write_access_allowed->toArray() : null,
                'passport_data' => ($this->passport_data instanceof ObjectTypeInterface) ? $this->passport_data->toArray() : null,
                'proximity_alert_triggered' => ($this->proximity_alert_triggered instanceof ObjectTypeInterface) ? $this->proximity_alert_triggered->toArray() : null,
                'forum_topic_created' => ($this->forum_topic_created instanceof ObjectTypeInterface) ? $this->forum_topic_created->toArray() : null,
                'forum_topic_edited' => ($this->forum_topic_edited instanceof ObjectTypeInterface) ? $this->forum_topic_edited->toArray() : null,
                'forum_topic_closed' => ($this->forum_topic_closed instanceof ObjectTypeInterface) ? $this->forum_topic_closed->toArray() : null,
                'forum_topic_reopened' => ($this->forum_topic_reopened instanceof ObjectTypeInterface) ? $this->forum_topic_reopened->toArray() : null,
                'general_forum_topic_hidden' => ($this->general_forum_topic_hidden instanceof ObjectTypeInterface) ? $this->general_forum_topic_hidden->toArray() : null,
                'general_forum_topic_unhidden' => ($this->general_forum_topic_unhidden instanceof ObjectTypeInterface) ? $this->general_forum_topic_unhidden->toArray() : null,
                'video_chat_scheduled' => ($this->video_chat_scheduled instanceof ObjectTypeInterface) ? $this->video_chat_scheduled->toArray() : null,
                'video_chat_started' => ($this->video_chat_started instanceof ObjectTypeInterface) ? $this->video_chat_started->toArray() : null,
                'video_chat_ended' => ($this->video_chat_ended instanceof ObjectTypeInterface) ? $this->video_chat_ended->toArray() : null,
                'video_chat_participants_invited' => ($this->video_chat_participants_invited instanceof ObjectTypeInterface) ? $this->video_chat_participants_invited->toArray() : null,
                'web_app_data' => ($this->web_app_data instanceof ObjectTypeInterface) ? $this->web_app_data->toArray() : null,
                'reply_markup' => ($this->reply_markup instanceof ObjectTypeInterface) ? $this->reply_markup->toArray() : null,
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return Message
         */
        public static function fromArray(array $data): Message
        {
            $object = new self();

            $object->message_id = $data['message_id'] ?? null;
            $object->message_thread_id = $data['message_thread_id'] ?? null;
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->sender_chat = isset($data['sender_chat']) ? Chat::fromArray($data['sender_chat']) : null;
            $object->date = $data['date'] ?? null;
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
            $object->forward_from = isset($data['forward_from']) ? User::fromArray($data['forward_from']) : null;
            $object->forward_from_chat = isset($data['forward_from_chat']) ? Chat::fromArray($data['forward_from_chat']) : null;
            $object->forward_from_message_id = $data['forward_from_message_id'] ?? null;
            $object->forward_signature = $data['forward_signature'] ?? null;
            $object->forward_sender_name = $data['forward_sender_name'] ?? null;
            $object->forward_date = $data['forward_date'] ?? null;
            $object->is_topic_message = $data['is_topic_message'] ?? null;
            $object->is_automatic_forward = $data['is_automatic_forward'] ?? null;
            $object->reply_to_message = isset($data['reply_to_message']) ? self::fromArray($data['reply_to_message']) : null;
            $object->via_bot = isset($data['via_bot']) ? User::fromArray($data['via_bot']) : null;
            $object->edit_date = $data['edit_date'] ?? null;
            $object->has_protected_content = $data['has_protected_content'] ?? null;
            $object->media_group_id = $data['media_group_id'] ?? null;
            $object->author_signature = $data['author_signature'] ?? null;
            $object->text = $data['text'] ?? null;
            $object->entities = isset($data['entities']) && is_array($data['entities']) ? array_map(function ($item) {
                return MessageEntity::fromArray($item);
            }, $data['entities']) : null;
            $object->animation = isset($data['animation']) ? Animation::fromArray($data['animation']) : null;
            $object->audio = isset($data['audio']) ? Audio::fromArray($data['audio']) : null;
            $object->document = isset($data['document']) ? Document::fromArray($data['document']) : null;
            $object->photo = isset($data['photo']) && is_array($data['photo']) ? array_map(function ($item)
            {
                return PhotoSize::fromArray($item);
            }, $data['photo']) : null;
            $object->sticker = isset($data['sticker']) ? Sticker::fromArray($data['sticker']) : null;
            $object->video = isset($data['video']) ? Video::fromArray($data['video']) : null;
            $object->video_note = isset($data['video_note']) ? VideoNote::fromArray($data['video_note']) : null;
            $object->voice = isset($data['voice']) ? Voice::fromArray($data['voice']) : null;
            $object->caption = $data['caption'] ?? null;
            $object->caption_entities = isset($data['caption_entities']) && is_array($data['caption_entities']) ? array_map(function ($item) {
                return MessageEntity::fromArray($item);
            }, $data['caption_entities']) : null;
            $object->has_media_spoiler = $data['has_media_spoiler'] ?? null;
            $object->contact = isset($data['contact']) ? Contact::fromArray($data['contact']) : null;
            $object->dice = isset($data['dice']) ? Dice::fromArray($data['dice']) : null;
            $object->game = isset($data['game']) ? Game::fromArray($data['game']) : null;
            $object->poll = isset($data['poll']) ? Poll::fromArray($data['poll']) : null;
            $object->venue = isset($data['venue']) ? Venue::fromArray($data['venue']) : null;
            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;
            $object->new_chat_members = isset($data['new_chat_members']) && is_array($data['new_chat_members']) ? array_map(function ($item) {
                return User::fromArray($item);
            }, $data['new_chat_members']) : null;
            $object->left_chat_member = isset($data['left_chat_member']) ? User::fromArray($data['left_chat_member']) : null;
            $object->new_chat_title = $data['new_chat_title'] ?? null;
            $object->new_chat_photo = isset($data['new_chat_photo']) && is_array($data['new_chat_photo']) ? array_map(function ($item) {
                return PhotoSize::fromArray($item);
            }, $data['new_chat_photo']) : null;
            $object->delete_chat_photo = $data['delete_chat_photo'] ?? null;
            $object->group_chat_created = $data['group_chat_created'] ?? null;
            $object->supergroup_chat_created = $data['supergroup_chat_created'] ?? null;
            $object->channel_chat_created = $data['channel_chat_created'] ?? null;
            $object->message_auto_delete_timer_changed = isset($data['message_auto_delete_timer_changed']) ? MessageAutoDeleteTimerChanged::fromArray($data['message_auto_delete_timer_changed']) : null;
            $object->migrate_to_chat_id = $data['migrate_to_chat_id'] ?? null;
            $object->migrate_from_chat_id = $data['migrate_from_chat_id'] ?? null;
            $object->pinned_message = isset($data['pinned_message']) ? self::fromArray($data['pinned_message']) : null;
            $object->invoice = isset($data['invoice']) ? Invoice::fromArray($data['invoice']) : null;
            $object->successful_payment = isset($data['successful_payment']) ? SuccessfulPayment::fromArray($data['successful_payment']) : null;
            $object->user_shared = isset($data['user_shared']) ? UserShared::fromArray($data['user_shared']) : null;
            $object->chat_shared = isset($data['chat_shared']) ? ChatShared::fromArray($data['chat_shared']) : null;
            $object->connected_website = $data['connected_website'] ?? null;
            $object->write_access_allowed = isset($data['write_access_allowed']) ? WriteAccessAllowed::fromArray($data['write_access_allowed']) : null;
            $object->passport_data = isset($data['passport_data']) ? PassportData::fromArray($data['passport_data']) : null;
            $object->proximity_alert_triggered = isset($data['proximity_alert_triggered']) ? ProximityAlertTriggered::fromArray($data['proximity_alert_triggered']) : null;
            $object->forum_topic_created = isset($data['forum_topic_created']) ? ForumTopicCreated::fromArray($data['forum_topic_created']) : null;
            $object->forum_topic_edited = isset($data['forum_topic_edited']) ? ForumTopicEdited::fromArray($data['forum_topic_edited']) : null;
            $object->forum_topic_closed = isset($data['forum_topic_closed']) ? ForumTopicClosed::fromArray($data['forum_topic_closed']) : null;
            $object->forum_topic_reopened = isset($data['forum_topic_reopened']) ? ForumTopicReopened::fromArray($data['forum_topic_reopened']) : null;
            $object->general_forum_topic_hidden = isset($data['general_forum_topic_hidden']) ? GeneralForumTopicHidden::fromArray($data['general_forum_topic_hidden']) : null;
            $object->general_forum_topic_unhidden = isset($data['general_forum_topic_unhidden']) ? GeneralForumTopicUnhidden::fromArray($data['general_forum_topic_unhidden']) : null;
            $object->video_chat_scheduled = isset($data['video_chat_scheduled']) ? VideoChatScheduled::fromArray($data['video_chat_scheduled']) : null;
            $object->video_chat_started = isset($data['video_chat_started']) ? VideoChatStarted::fromArray($data['video_chat_started']) : null;
            $object->video_chat_ended = isset($data['video_chat_ended']) ? VideoChatEnded::fromArray($data['video_chat_ended']) : null;
            $object->video_chat_participants_invited = isset($data['video_chat_participants_invited']) ? VideoChatParticipantsInvited::fromArray($data['video_chat_participants_invited']) : null;
            $object->web_app_data = isset($data['web_app_data']) ? WebAppData::fromArray($data['web_app_data']) : null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;

            return $object;
        }
    }