<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

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
         * @return int|null
         */
        public function getMessageId(): ?int
        {
            return $this->message_id;
        }

        /**
         * @return int|null
         */
        public function getMessageThreadId(): ?int
        {
            return $this->message_thread_id;
        }

        /**
         * @return User|null
         */
        public function getFrom(): ?User
        {
            return $this->from;
        }

        /**
         * @return Chat|null
         */
        public function getSenderChat(): ?Chat
        {
            return $this->sender_chat;
        }

        /**
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * @return Chat|null
         */
        public function getChat(): ?Chat
        {
            return $this->chat;
        }

        /**
         * @return User|null
         */
        public function getForwardFrom(): ?User
        {
            return $this->forward_from;
        }

        /**
         * @return Chat|null
         */
        public function getForwardFromChat(): ?Chat
        {
            return $this->forward_from_chat;
        }

        /**
         * @return string|null
         */
        public function getForwardSignature(): ?string
        {
            return $this->forward_signature;
        }

        /**
         * @return string|null
         */
        public function getForwardSenderName(): ?string
        {
            return $this->forward_sender_name;
        }

        /**
         * @return int|null
         */
        public function getForwardDate(): ?int
        {
            return $this->forward_date;
        }

        /**
         * @return bool
         */
        public function isIsTopicMessage(): bool
        {
            return $this->is_topic_message;
        }

        /**
         * @return Message|null
         */
        public function getReplyToMessage(): ?Message
        {
            return $this->reply_to_message;
        }

        /**
         * @return User|null
         */
        public function getViaBot(): ?User
        {
            return $this->via_bot;
        }

        /**
         * @return int|null
         */
        public function getEditDate(): ?int
        {
            return $this->edit_date;
        }

        /**
         * @return bool
         */
        public function isHasProtectedContent(): bool
        {
            return $this->has_protected_content;
        }

        /**
         * @return string|null
         */
        public function getMediaGroupId(): ?string
        {
            return $this->media_group_id;
        }

        /**
         * @return string|null
         */
        public function getAuthorSignature(): ?string
        {
            return $this->author_signature;
        }

        /**
         * @return string|null
         */
        public function getText(): ?string
        {
            return $this->text;
        }

        /**
         * @return MessageEntity[]|null
         */
        public function getEntities(): ?array
        {
            return $this->entities;
        }

        /**
         * @return Animation|null
         */
        public function getAnimation(): ?Animation
        {
            return $this->animation;
        }

        /**
         * @return Audio|null
         */
        public function getAudio(): ?Audio
        {
            return $this->audio;
        }

        /**
         * @return Document|null
         */
        public function getDocument(): ?Document
        {
            return $this->document;
        }

        /**
         * @return PhotoSize[]|null
         */
        public function getPhoto(): ?array
        {
            return $this->photo;
        }

        /**
         * @return Sticker|null
         */
        public function getSticker(): ?Sticker
        {
            return $this->sticker;
        }

        /**
         * @return Video|null
         */
        public function getVideo(): ?Video
        {
            return $this->video;
        }

        /**
         * @return string|null
         */
        public function getCaption(): ?string
        {
            return $this->caption;
        }

        /**
         * @return MessageEntity[]|null
         */
        public function getCaptionEntities(): ?array
        {
            return $this->caption_entities;
        }

        /**
         * @return bool
         */
        public function isHasMediaSpoiler(): bool
        {
            return $this->has_media_spoiler;
        }

        /**
         * @return Contact|null
         */
        public function getContact(): ?Contact
        {
            return $this->contact;
        }

        /**
         * @return Dice|null
         */
        public function getDice(): ?Dice
        {
            return $this->dice;
        }

        /**
         * @return Game|null
         */
        public function getGame(): ?Game
        {
            return $this->game;
        }

        /**
         * @return Poll|null
         */
        public function getPoll(): ?Poll
        {
            return $this->poll;
        }

        /**
         * @return Venue|null
         */
        public function getVenue(): ?Venue
        {
            return $this->venue;
        }

        /**
         * @return Location|null
         */
        public function getLocation(): ?Location
        {
            return $this->location;
        }

        /**
         * @return User[]|null
         */
        public function getNewChatMembers(): ?array
        {
            return $this->new_chat_members;
        }

        /**
         * @return User|null
         */
        public function getLeftChatMember(): ?User
        {
            return $this->left_chat_member;
        }

        /**
         * @return string|null
         */
        public function getNewChatTitle(): ?string
        {
            return $this->new_chat_title;
        }

        /**
         * @return PhotoSize[]|null
         */
        public function getNewChatPhoto(): ?array
        {
            return $this->new_chat_photo;
        }

        /**
         * @return bool
         */
        public function isDeleteChatPhoto(): bool
        {
            return $this->delete_chat_photo;
        }

        /**
         * @return bool
         */
        public function isGroupChatCreated(): bool
        {
            return $this->group_chat_created;
        }

        /**
         * @return bool
         */
        public function isSupergroupChatCreated(): bool
        {
            return $this->supergroup_chat_created;
        }

        /**
         * @return bool
         */
        public function isChannelChatCreated(): bool
        {
            return $this->channel_chat_created;
        }

        /**
         * @return MessageAutoDeleteTimerChanged|null
         */
        public function getMessageAutoDeleteTimerChanged(): ?MessageAutoDeleteTimerChanged
        {
            return $this->message_auto_delete_timer_changed;
        }

        /**
         * @return int|null
         */
        public function getMigrateToChatId(): ?int
        {
            return $this->migrate_to_chat_id;
        }

        /**
         * @return int|null
         */
        public function getMigrateFromChatId(): ?int
        {
            return $this->migrate_from_chat_id;
        }

        /**
         * @return Message|null
         */
        public function getPinnedMessage(): ?Message
        {
            return $this->pinned_message;
        }

        /**
         * @return Invoice|null
         */
        public function getInvoice(): ?Invoice
        {
            return $this->invoice;
        }

        /**
         * @return SuccessfulPayment|null
         */
        public function getSuccessfulPayment(): ?SuccessfulPayment
        {
            return $this->successful_payment;
        }

        /**
         * @return UserShared|null
         */
        public function getUserShared(): ?UserShared
        {
            return $this->user_shared;
        }

        /**
         * @return ChatShared|null
         */
        public function getChatShared(): ?ChatShared
        {
            return $this->chat_shared;
        }

        /**
         * @return string|null
         */
        public function getConnectedWebsite(): ?string
        {
            return $this->connected_website;
        }

        /**
         * @return WriteAccessAllowed|null
         */
        public function getWriteAccessAllowed(): ?WriteAccessAllowed
        {
            return $this->write_access_allowed;
        }

        /**
         * @return PassportData|null
         */
        public function getPassportData(): ?PassportData
        {
            return $this->passport_data;
        }

        /**
         * @return ProximityAlertTriggered|null
         */
        public function getProximityAlertTriggered(): ?ProximityAlertTriggered
        {
            return $this->proximity_alert_triggered;
        }

        /**
         * @return ForumTopicCreated|null
         */
        public function getForumTopicCreated(): ?ForumTopicCreated
        {
            return $this->forum_topic_created;
        }

        /**
         * @return ForumTopicEdited|null
         */
        public function getForumTopicEdited(): ?ForumTopicEdited
        {
            return $this->forum_topic_edited;
        }

        /**
         * @return ForumTopicClosed|null
         */
        public function getForumTopicClosed(): ?ForumTopicClosed
        {
            return $this->forum_topic_closed;
        }

        /**
         * @return ForumTopicReopened|null
         */
        public function getForumTopicReopened(): ?ForumTopicReopened
        {
            return $this->forum_topic_reopened;
        }

        /**
         * @return GeneralForumTopicHidden|null
         */
        public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
        {
            return $this->general_forum_topic_hidden;
        }

        /**
         * @return GeneralForumTopicUnhidden|null
         */
        public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
        {
            return $this->general_forum_topic_unhidden;
        }

        /**
         * @return VideoChatScheduled|null
         */
        public function getVideoChatScheduled(): ?VideoChatScheduled
        {
            return $this->video_chat_scheduled;
        }

        /**
         * @return VideoChatStarted|null
         */
        public function getVideoChatStarted(): ?VideoChatStarted
        {
            return $this->video_chat_started;
        }

        /**
         * @return VideoChatEnded|null
         */
        public function getVideoChatEnded(): ?VideoChatEnded
        {
            return $this->video_chat_ended;
        }

        /**
         * @return VideoChatParticipantsInvited|null
         */
        public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
        {
            return $this->video_chat_participants_invited;
        }

        /**
         * @return WebAppData|null
         */
        public function getWebAppData(): ?WebAppData
        {
            return $this->web_app_data;
        }

        /**
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
            $entities = null;
            if($this->entities !== null)
            {
                $entities = [];
                foreach($this->entities as $entity)
                {
                    $entities[] = $entity->toArray();
                }
            }

            $photo = null;
            if($this->photo !== null)
            {
                $photo = [];
                foreach($this->photo as $photo_size)
                {
                    $photo[] = $photo_size->toArray();
                }
            }

            $caption_entities = null;
            if($this->caption_entities !== null)
            {
                $caption_entities = [];
                foreach($this->caption_entities as $caption_entity)
                {
                    $caption_entities[] = $caption_entity->toArray();
                }
            }

            $new_chat_members = [];
            if($this->new_chat_members !== null)
            {
                foreach($this->new_chat_members as $new_chat_member)
                {
                    $new_chat_members[] = $new_chat_member->toArray();
                }
            }

            $new_chat_photo = [];
            if($this->new_chat_photo !== null)
            {
                foreach($this->new_chat_photo as $new_chat_photo_size)
                {
                    $new_chat_photo[] = $new_chat_photo_size->toArray();
                }
            }

            return [
                'message_id' => $this->message_id,
                'message_thread_id' => $this->message_thread_id,
                'from' => ($this->from instanceof User) ? $this->from->toArray() : null,
                'sender_chat' => ($this->sender_chat instanceof Chat) ? $this->sender_chat->toArray() : null,
                'date' => $this->date,
                'chat' => ($this->chat instanceof Chat) ? $this->chat->toArray() : null,
                'forward_from' => ($this->forward_from instanceof User) ? $this->forward_from->toArray() : null,
                'forward_from_chat' => ($this->forward_from_chat instanceof Chat) ? $this->forward_from_chat->toArray() : null,
                'forward_signature' => $this->forward_signature,
                'forward_sender_name' => $this->forward_sender_name,
                'forward_date' => $this->forward_date,
                'is_topic_message' => $this->is_topic_message,
                'reply_to_message' => ($this->reply_to_message instanceof Message) ? $this->reply_to_message->toArray() : null,
                'via_bot' => ($this->via_bot instanceof User) ? $this->via_bot->toArray() : null,
                'edit_date' => $this->edit_date,
                'has_protected_content' => $this->has_protected_content,
                'media_group_id' => $this->media_group_id,
                'author_signature' => $this->author_signature,
                'text' => $this->text,
                'entities' => $entities,
                'animation' => ($this->animation instanceof Animation) ? $this->animation->toArray() : null,
                'audio' => ($this->audio instanceof Audio) ? $this->audio->toArray() : null,
                'document' => ($this->document instanceof Document) ? $this->document->toArray() : null,
                'photo' => $photo,
                'sticker' => ($this->sticker instanceof Sticker) ? $this->sticker->toArray() : null,
                'video' => ($this->video instanceof Video) ? $this->video->toArray() : null,
                'video_note' => ($this->video_note instanceof VideoNote) ? $this->video_note->toArray() : null,
                'voice' => ($this->voice instanceof Voice) ? $this->voice->toArray() : null,
                'caption' => $this->caption,
                'caption_entities' => $caption_entities,
                'has_media_spoiler' => $this->has_media_spoiler,
                'contact' => ($this->contact instanceof Contact) ? $this->contact->toArray() : null,
                'dice' => ($this->dice instanceof Dice) ? $this->dice->toArray() : null,
                'game' => ($this->game instanceof Game) ? $this->game->toArray() : null,
                'poll' => ($this->poll instanceof Poll) ? $this->poll->toArray() : null,
                'venue' => ($this->venue instanceof Venue) ? $this->venue->toArray() : null,
                'location' => ($this->location instanceof Location) ? $this->location->toArray() : null,
                'new_chat_members' => $new_chat_members,
                'left_chat_member' => ($this->left_chat_member instanceof User) ? $this->left_chat_member->toArray() : null,
                'new_chat_title' => $this->new_chat_title,
                'new_chat_photo' => $new_chat_photo,
                'delete_chat_photo' => $this->delete_chat_photo,
                'group_chat_created' => $this->group_chat_created,
                'supergroup_chat_created' => $this->supergroup_chat_created,
                'channel_chat_created' => $this->channel_chat_created,
                'message_auto_delete_timer_changed' => ($this->message_auto_delete_timer_changed instanceof MessageAutoDeleteTimerChanged) ? $this->message_auto_delete_timer_changed->toArray() : null,
                'migrate_to_chat_id' => $this->migrate_to_chat_id,
                'pinned_message' => ($this->pinned_message instanceof Message) ? $this->pinned_message->toArray() : null,
                'invoice' => ($this->invoice instanceof Invoice) ? $this->invoice->toArray() : null,
                'successful_payment' => ($this->successful_payment instanceof SuccessfulPayment) ? $this->successful_payment->toArray() : null,
                'user_shared' => ($this->user_shared instanceof UserShared) ? $this->user_shared->toArray() : null,
                'chat_shared' => ($this->chat_shared instanceof ChatShared) ? $this->chat_shared->toArray() : null,
                'connected_website' => $this->connected_website,
                'write_access_allowed' => ($this->write_access_allowed instanceof WriteAccessAllowed) ? $this->write_access_allowed->toArray() : null,
                'passport_data' => ($this->passport_data instanceof PassportData) ? $this->passport_data->toArray() : null,
                'proximity_alert_triggered' => ($this->proximity_alert_triggered instanceof ProximityAlertTriggered) ? $this->proximity_alert_triggered->toArray() : null,
                'forum_topic_created' => ($this->forum_topic_created instanceof ForumTopicCreated) ? $this->forum_topic_created->toArray() : null,
                'forum_topic_edited' => ($this->forum_topic_edited instanceof ForumTopicEdited) ? $this->forum_topic_edited->toArray() : null,
                'forum_topic_closed' => ($this->forum_topic_closed instanceof ForumTopicClosed) ? $this->forum_topic_closed->toArray() : null,
                'forum_topic_reopened' => ($this->forum_topic_reopened instanceof ForumTopicReopened) ? $this->forum_topic_reopened->toArray() : null,
                'general_forum_topic_hidden' => ($this->general_forum_topic_hidden instanceof GeneralForumTopicHidden) ? $this->general_forum_topic_hidden->toArray() : null,
                'general_forum_topic_unhidden' => ($this->general_forum_topic_unhidden instanceof GeneralForumTopicUnhidden) ? $this->general_forum_topic_unhidden->toArray() : null,
                'video_chat_scheduled' => ($this->video_chat_scheduled instanceof VideoChatScheduled) ? $this->video_chat_scheduled->toArray() : null,
                'video_chat_started' => ($this->video_chat_started instanceof VideoChatStarted) ? $this->video_chat_started->toArray() : null,
                'video_chat_ended' => ($this->video_chat_ended instanceof VideoChatEnded) ? $this->video_chat_ended->toArray() : null,
                'video_chat_participants_invited' => ($this->video_chat_participants_invited instanceof VideoChatParticipantsInvited) ? $this->video_chat_participants_invited->toArray() : null,
                'web_app_data' => ($this->web_app_data instanceof WebAppData) ? $this->web_app_data->toArray() : null,
                'reply_markup' => ($this->reply_markup instanceof InlineKeyboardMarkup) ? $this->reply_markup->toArray() : null,
            ];
        }

        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->message_id = @$data['message_id'] ?? null;
            $object->message_thread_id = @$data['message_thread_id'] ?? null;
            $object->from = (@$data['from'] !== null) ? User::fromArray($data['from']) : null;
            $object->sender_chat = (@$data['sender_chat'] !== null) ? Chat::fromArray($data['sender_chat']) : null;
            $object->date = @$data['date'] ?? null;
            $object->chat = (@$data['chat'] !== null) ? Chat::fromArray($data['chat']) : null;
            $object->forward_from = (@$data['forward_from'] !== null) ? User::fromArray($data['forward_from']) : null;
            $object->forward_from_chat = (@$data['forward_from_chat'] !== null) ? Chat::fromArray($data['forward_from_chat']) : null;
            $object->forward_signature = @$data['forward_signature'] ?? null;
            $object->forward_sender_name = @$data['forward_sender_name'] ?? null;
            $object->forward_date = @$data['forward_date'] ?? null;
            $object->is_topic_message = @$data['is_topic_message'] ?? null;
            $object->reply_to_message = (@$data['reply_to_message'] !== null) ? self::fromArray($data['reply_to_message']) : null;
            $object->via_bot = (@$data['via_bot'] !== null) ? User::fromArray($data['via_bot']) : null;
            $object->edit_date = @$data['edit_date'] ?? null;
            $object->has_protected_content = @$data['has_protected_content'] ?? null;
            $object->media_group_id = @$data['media_group_id'] ?? null;
            $object->author_signature = @$data['author_signature'] ?? null;
            $object->text = @$data['text'] ?? null;

            if (isset($data['entities']) && is_array($data['entities'])) {
                $object->entities = [];
                foreach ($data['entities'] as $item) {
                    $object->entities[] = MessageEntity::fromArray($item);
                }
            }

            $object->animation = (@$data['animation'] !== null) ? Animation::fromArray($data['animation']) : null;
            $object->audio = (@$data['audio'] !== null) ? Audio::fromArray($data['audio']) : null;
            $object->document = (@$data['document'] !== null) ? Document::fromArray($data['document']) : null;

            if (isset($data['photo']) && is_array($data['photo']))
            {
                $object->photo = [];
                foreach ($data['photo'] as $item)
                {
                    $object->photo[] = PhotoSize::fromArray($item);
                }
            }

            $object->sticker = (@$data['sticker'] !== null) ? Sticker::fromArray($data['sticker']) : null;
            $object->video = (@$data['video'] !== null) ? Video::fromArray($data['video']) : null;
            $object->video_note = (@$data['video_note'] !== null) ? VideoNote::fromArray($data['video_note']) : null;
            $object->voice = (@$data['voice'] !== null) ? Voice::fromArray($data['voice']) : null;
            $object->caption = @$data['caption'] ?? null;

            if (isset($data['caption_entities']) && is_array($data['caption_entities']))
            {
                $object->caption_entities = [];
                foreach ($data['caption_entities'] as $item)
                {
                    $object->caption_entities[] = MessageEntity::fromArray($item);
                }
            }

            $object->has_media_spoiler = @$data['has_media_spoiler'] ?? null;
            $object->contact = (@$data['contact'] !== null) ? Contact::fromArray($data['contact']) : null;
            $object->dice = (@$data['dice'] !== null) ? Dice::fromArray($data['dice']) : null;
            $object->game = (@$data['game'] !== null) ? Game::fromArray($data['game']) : null;
            $object->poll = (@$data['poll'] !== null) ? Poll::fromArray($data['poll']) : null;
            $object->venue = (@$data['venue'] !== null) ? Venue::fromArray($data['venue']) : null;
            $object->location = (@$data['location'] !== null) ? Location::fromArray($data['location']) : null;

            if (isset($data['new_chat_members']) && is_array($data['new_chat_members']))
            {
                $object->new_chat_members = [];
                foreach ($data['new_chat_members'] as $item)
                {
                    $object->new_chat_members[] = User::fromArray($item);
                }
            }

            $object->left_chat_member = (@$data['left_chat_member'] !== null) ? User::fromArray($data['left_chat_member']) : null;
            $object->new_chat_title = @$data['new_chat_title'] ?? null;

            if (isset($data['new_chat_photo']) && is_array($data['new_chat_photo']))
            {
                $object->new_chat_photo = [];
                foreach ($data['new_chat_photo'] as $item)
                {
                    $object->new_chat_photo[] = PhotoSize::fromArray($item);
                }
            }

            $object->delete_chat_photo = @$data['delete_chat_photo'] ?? null;
            $object->group_chat_created = @$data['group_chat_created'] ?? null;
            $object->supergroup_chat_created = @$data['supergroup_chat_created'] ?? null;
            $object->channel_chat_created = @$data['channel_chat_created'] ?? null;
            $object->message_auto_delete_timer_changed = (@$data['message_auto_delete_timer_changed'] !== null) ? MessageAutoDeleteTimerChanged::fromArray($data['message_auto_delete_timer_changed']) : null;
            $object->migrate_to_chat_id = @$data['migrate_to_chat_id'] ?? null;
            $object->migrate_from_chat_id = @$data['migrate_from_chat_id'] ?? null;
            $object->pinned_message = (@$data['pinned_message'] !== null) ? self::fromArray($data['pinned_message']) : null;
            $object->invoice = (@$data['invoice'] !== null) ? Invoice::fromArray($data['invoice']) : null;
            $object->successful_payment = (@$data['successful_payment'] !== null) ? SuccessfulPayment::fromArray($data['successful_payment']) : null;
            $object->user_shared = (@$data['user_shared'] !== null) ? UserShared::fromArray($data['user_shared']) : null;
            $object->chat_shared = (@$data['chat_shared'] !== null) ? ChatShared::fromArray($data['chat_shared']) : null;
            $object->connected_website = @$data['connected_website'] ?? null;
            $object->write_access_allowed = (@$data['write_access_allowed'] !== null) ? WriteAccessAllowed::fromArray($data['write_access_allowed']) : null;
            $object->passport_data = (@$data['passport_data'] !== null) ? PassportData::fromArray($data['passport_data']) : null;
            $object->proximity_alert_triggered = (@$data['proximity_alert_triggered'] !== null) ? ProximityAlertTriggered::fromArray($data['proximity_alert_triggered']) : null;
            $object->forum_topic_created = (@$data['forum_topic_created'] !== null) ? ForumTopicCreated::fromArray($data['forum_topic_created']) : null;
            $object->forum_topic_edited = (@$data['forum_topic_edited'] !== null) ? ForumTopicEdited::fromArray($data['forum_topic_edited']) : null;
            $object->forum_topic_closed = (@$data['forum_topic_closed'] !== null) ? ForumTopicClosed::fromArray($data['forum_topic_closed']) : null;
            $object->forum_topic_reopened = (@$data['forum_topic_reopened'] !== null) ? ForumTopicReopened::fromArray($data['forum_topic_reopened']) : null;
            $object->general_forum_topic_hidden = (@$data['general_forum_topic_hidden'] !== null) ? GeneralForumTopicHidden::fromArray($data['general_forum_topic_hidden']) : null;
            $object->general_forum_topic_unhidden = (@$data['general_forum_topic_unhidden'] !== null) ? GeneralForumTopicUnhidden::fromArray($data['general_forum_topic_unhidden']) : null;
            $object->video_chat_scheduled = (@$data['video_chat_scheduled'] !== null) ? VideoChatScheduled::fromArray($data['video_chat_scheduled']) : null;
            $object->video_chat_started = (@$data['video_chat_started'] !== null) ? VideoChatStarted::fromArray($data['video_chat_started']) : null;
            $object->video_chat_ended = (@$data['video_chat_ended'] !== null) ? VideoChatEnded::fromArray($data['video_chat_ended']) : null;
            $object->video_chat_participants_invited = (@$data['video_chat_participants_invited'] !== null) ? VideoChatParticipantsInvited::fromArray($data['video_chat_participants_invited']) : null;
            $object->web_app_data = (@$data['web_app_data'] !== null) ? WebAppData::fromArray($data['web_app_data']) : null;
            $object->reply_markup = (@$data['reply_markup'] !== null) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;

            return $object;
        }
    }