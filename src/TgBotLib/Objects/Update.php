<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\ChosenInlineResult;
    use TgBotLib\Objects\Inline\InlineQuery;
    use TgBotLib\Objects\Payments\PaidMediaPurchased;
    use TgBotLib\Objects\Payments\PreCheckoutQuery;
    use TgBotLib\Objects\Payments\ShippingQuery;

    class Update implements ObjectTypeInterface
    {
        private int $update_id;
        private ?Message $message;
        private ?Message $edited_message;
        private ?Message $channel_post;
        private ?Message $edited_channel_post;
        private ?BusinessConnection $business_connection;
        private ?Message $business_message;
        private ?Message $edited_business_message;
        private ?BusinessMessagesDeleted $deleted_business_messages;
        private ?MessageReactionUpdated $message_reaction;
        private ?MessageReactionCountUpdated $message_reaction_count;
        private ?InlineQuery $inline_query;
        private ?ChosenInlineResult $chosen_inline_result;
        private ?CallbackQuery $callback_query;
        private ?ShippingQuery $shipping_query;
        private ?PreCheckoutQuery $pre_checkout_query;
        private ?PaidMediaPurchased $purchased_paid_media;
        private ?Poll $poll;
        private ?PollAnswer $poll_answer;
        private ?ChatMemberUpdated $my_chat_member;
        private ?ChatMemberUpdated $chat_member;
        private ?ChatJoinRequest $chat_join_request;
        private ?ChatBoostUpdated $chat_boost;
        private ?ChatBoostRemoved $removed_chat_boost;

        /**
         * The update's unique identifier. Update identifiers start from a certain positive number and increase
         * sequentially. This ID becomes especially handy if you're using webhooks, since it allows you to ignore
         * repeated updates or to restore the correct update sequence, should they get out of order. If there are no new
         * updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
         *
         * @return int
         */
        public function getUpdateId(): int
        {
            return $this->update_id;
        }

        /**
         * Optional. New incoming message of any kind - text, photo, sticker, etc.
         *
         * @return Message|null
         */
        public function getMessage(): ?Message
        {
            return $this->message;
        }

        /**
         * Optional. New version of a message that is known to the bot and was edited
         *
         * @return Message|null
         */
        public function getEditedMessage(): ?Message
        {
            return $this->edited_message;
        }

        /**
         * Optional. New incoming channel post of any kind - text, photo, sticker, etc.
         *
         * @return Message|null
         */
        public function getChannelPost(): ?Message
        {
            return $this->channel_post;
        }

        /**
         * Optional. New version of a channel post that is known to the bot and was edited
         *
         * @return Message|null
         */
        public function getEditedChannelPost(): ?Message
        {
            return $this->edited_channel_post;
        }

        /**
         * Optional. New message from a connected business account
         *
         * @return Message|null
         */
        public function getBusinessMessage(): ?Message
        {
            return $this->business_message;
        }

        /**
         * Optional. New version of a message from a connected business account
         *
         * @return Message|null
         */
        public function getEditedBusinessMessage(): ?Message
        {
            return $this->edited_business_message;
        }

        /**
         * Optional. Messages were deleted from a connected business account
         *
         * @return BusinessMessagesDeleted|null
         */
        public function getDeletedBusinessMessages(): ?BusinessMessagesDeleted
        {
            return $this->deleted_business_messages;
        }

        /**
         * Optional. A reaction to a message was changed by a user. The bot must be an administrator in the chat and
         * must explicitly specify "message_reaction" in the list of allowed_updates to receive these updates.
         * The update isn't received for reactions set by bots.
         *
         * @return MessageReactionUpdated|null
         */
        public function getMessageReaction(): ?MessageReactionUpdated
        {
            return $this->message_reaction;
        }

        /**
         * Optional. Reactions to a message with anonymous reactions were changed. The bot must be an administrator in
         * the chat and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these
         * updates. The updates are grouped and can be sent with delay up to a few minutes.
         *
         * @return MessageReactionCountUpdated|null
         */
        public function getMessageReactionCount(): ?MessageReactionCountUpdated
        {
            return $this->message_reaction_count;
        }

        /**
         * Optional. The bot was connected to or disconnected from a business account, or a user
         * edited an existing connection with the bot
         *
         * @return BusinessConnection|null
         */
        public function getBusinessConnection(): ?BusinessConnection
        {
            return $this->business_connection;
        }

        /**
         * Optional. New incoming inline query
         *
         * @see https://core.telegram.org/bots/api#inline-mode
         * @return InlineQuery|null
         */
        public function getInlineQuery(): ?InlineQuery
        {
            return $this->inline_query;
        }

        /**
         * Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see
         * our documentation on the feedback collecting for details on how to enable these updates for your bot.
         *
         * @see https://core.telegram.org/bots/api#inline-mode
         * @see https://core.telegram.org/bots/inline#collecting-feedback
         * @return ChosenInlineResult|null
         */
        public function getChosenInlineResult(): ?ChosenInlineResult
        {
            return $this->chosen_inline_result;
        }

        /**
         * Optional. New incoming callback query
         *
         * @return CallbackQuery|null
         */
        public function getCallbackQuery(): ?CallbackQuery
        {
            return $this->callback_query;
        }

        /**
         * Optional. New incoming shipping query. Only for invoices with flexible price
         *
         * @return ShippingQuery|null
         */
        public function getShippingQuery(): ?ShippingQuery
        {
            return $this->shipping_query;
        }

        /**
         * Optional. New incoming pre-checkout query. Contains full information about checkout
         *
         * @return PreCheckoutQuery|null
         */
        public function getPreCheckoutQuery(): ?PreCheckoutQuery
        {
            return $this->pre_checkout_query;
        }

        /**
         * Optional. A user purchased paid media with a non-empty payload sent by the bot in a non-channel chat
         *
         * @return PaidMediaPurchased|null
         */
        public function getPurchasedPaidMedia(): ?PaidMediaPurchased
        {
            return $this->purchased_paid_media;
        }

        /**
         * Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot
         *
         * @return Poll|null
         */
        public function getPoll(): ?Poll
        {
            return $this->poll;
        }

        /**
         * Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were
         * sent by the bot itself.
         *
         * @return PollAnswer|null
         */
        public function getPollAnswer(): ?PollAnswer
        {
            return $this->poll_answer;
        }

        /**
         * Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only
         * when the bot is blocked or unblocked by the user.
         *
         * @return ChatMemberUpdated|null
         */
        public function getMyChatMember(): ?ChatMemberUpdated
        {
            return $this->my_chat_member;
        }

        /**
         * Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must
         * explicitly specify “chat_member” in the list of allowed_updates to receive these updates.
         *
         * @return ChatMemberUpdated|null
         */
        public function getChatMember(): ?ChatMemberUpdated
        {
            return $this->chat_member;
        }

        /**
         * Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator
         * right in the chat to receive these updates.
         *
         * @return ChatJoinRequest|null
         */
        public function getChatJoinRequest(): ?ChatJoinRequest
        {
            return $this->chat_join_request;
        }

        /**
         * Optional. A chat boost was added or changed.
         * The bot must be an administrator in the chat to receive these updates.
         *
         * @return ChatBoostUpdated|null
         */
        public function getChatBoost(): ?ChatBoostUpdated
        {
            return $this->chat_boost;
        }

        /**
         * Optional. A boost was removed from a chat.
         * The bot must be an administrator in the chat to receive these updates.
         *
         * @return ChatBoostRemoved|null
         */
        public function getRemovedChatBoost(): ?ChatBoostRemoved
        {
            return $this->removed_chat_boost;
        }

        /**
         * Retrieves any type of message that is currently available. This method checks for the presence of a standard message,
         * an edited message, a channel post, an edited channel post, a business message, or an edited business message,
         * and returns the first one found.
         *
         * @return Message|null
         */
        public function getAnyMessage(): ?Message
        {
            return
                $this->message ??
                $this->edited_message ??
                $this->channel_post ??
                $this->edited_channel_post ??
                $this->business_message ??
                $this->edited_business_message;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'update_id' => $this->update_id,
                'message' => ($this->message instanceof ObjectTypeInterface) ? $this->message->toArray() : null,
                'edited_message' => ($this->edited_message instanceof ObjectTypeInterface) ? $this->edited_message->toArray() : null,
                'channel_post' => ($this->channel_post instanceof ObjectTypeInterface) ? $this->channel_post->toArray() : null,
                'edited_channel_post' => ($this->edited_channel_post instanceof ObjectTypeInterface) ? $this->edited_channel_post->toArray() : null,
                'business_connection' => ($this->business_connection instanceof ObjectTypeInterface) ? $this->business_connection->toArray() : null,
                'business_message' => ($this->business_message instanceof ObjectTypeInterface) ? $this->business_message->toArray() : null,
                'edited_business_message' => ($this->edited_business_message instanceof ObjectTypeInterface) ? $this->edited_business_message->toArray() : null,
                'deleted_business_messages' => ($this->deleted_business_messages instanceof ObjectTypeInterface) ? $this->deleted_business_messages->toArray() : null,
                'message_reaction' => ($this->message_reaction instanceof ObjectTypeInterface) ? $this->message_reaction->toArray() : null,
                'message_reaction_count' => ($this->message_reaction_count instanceof ObjectTypeInterface) ? $this->message_reaction_count->toArray() : null,
                'inline_query' => ($this->inline_query instanceof ObjectTypeInterface) ? $this->inline_query->toArray() : null,
                'chosen_inline_result' => ($this->chosen_inline_result instanceof ObjectTypeInterface) ? $this->chosen_inline_result->toArray() : null,
                'callback_query' => ($this->callback_query instanceof ObjectTypeInterface) ? $this->callback_query->toArray() : null,
                'shipping_query' => ($this->shipping_query instanceof ObjectTypeInterface) ? $this->shipping_query->toArray() : null,
                'pre_checkout_query' => ($this->pre_checkout_query instanceof ObjectTypeInterface) ? $this->pre_checkout_query->toArray() : null,
                'purchased_paid_media' => ($this->purchased_paid_media instanceof ObjectTypeInterface) ? $this->purchased_paid_media->toArray() : null,
                'poll' => ($this->poll instanceof ObjectTypeInterface) ? $this->poll->toArray() : null,
                'poll_answer' => ($this->poll_answer instanceof ObjectTypeInterface) ? $this->poll_answer->toArray() : null,
                'my_chat_member' => ($this->my_chat_member instanceof ObjectTypeInterface) ? $this->my_chat_member->toArray() : null,
                'chat_member' => ($this->chat_member instanceof ObjectTypeInterface) ? $this->chat_member->toArray() : null,
                'chat_join_request' => ($this->chat_join_request instanceof ObjectTypeInterface) ? $this->chat_join_request->toArray() : null,
                'chat_boost' => ($this->chat_boost instanceof ObjectTypeInterface) ? $this->chat_boost->toArray() : null,
                'removed_chat_boost' => ($this->removed_chat_boost instanceof ObjectTypeInterface) ? $this->removed_chat_boost->toArray() : null,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function
        fromArray(?array $data): ?Update
        {
            if($data === null)
            {
                return null;
            }

            $object = new static();
            $object->update_id = $data['update_id'] ?? null;
            $object->message = isset($data['message']) ? Message::fromArray($data['message']) : null;
            $object->edited_message = isset($data['edited_message']) ? Message::fromArray($data['edited_message']) : null;
            $object->channel_post = isset($data['channel_post']) ? Message::fromArray($data['channel_post']) : null;
            $object->edited_channel_post = isset($data['edited_channel_post']) ? Message::fromArray($data['edited_channel_post']) : null;
            $object->business_connection = isset($data['business_connection']) ? BusinessConnection::fromArray($data['business_connection']) : null;
            $object->business_message = isset($data['business_message']) ? Message::fromArray($data['business_message']) : null;
            $object->edited_business_message = isset($data['edited_business_message']) ? Message::fromArray($data['edited_business_message']) : null;
            $object->deleted_business_messages = isset($data['deleted_business_messages']) ? BusinessMessagesDeleted::fromArray($data['deleted_business_messages']) : null;
            $object->message_reaction = isset($data['message_reaction']) ? MessageReactionUpdated::fromArray($data['message_reaction']) : null;
            $object->message_reaction_count = isset($data['message_reaction_count']) ? MessageReactionCountUpdated::fromArray($data['message_reaction_count']) : null;
            $object->inline_query = isset($data['inline_query']) ? InlineQuery::fromArray($data['inline_query']) : null;
            $object->chosen_inline_result = isset($data['chosen_inline_result']) ? ChosenInlineResult::fromArray($data['chosen_inline_result']) : null;
            $object->callback_query = isset($data['callback_query']) ? CallbackQuery::fromArray($data['callback_query']) : null;
            $object->shipping_query = isset($data['shipping_query']) ? ShippingQuery::fromArray($data['shipping_query']) : null;
            $object->pre_checkout_query = isset($data['pre_checkout_query']) ? PreCheckoutQuery::fromArray($data['pre_checkout_query']) : null;
            $object->purchased_paid_media = isset($data['purchased_paid_media']) ? PaidMediaPurchased::fromArray($data['purchased_paid_media']) : null;
            $object->poll = isset($data['poll']) ? Poll::fromArray($data['poll']) : null;
            $object->poll_answer = isset($data['poll_answer']) ? PollAnswer::fromArray($data['poll_answer']) : null;
            $object->my_chat_member = isset($data['my_chat_member']) ? ChatMemberUpdated::fromArray($data['my_chat_member']) : null;
            $object->chat_member = isset($data['chat_member']) ? ChatMemberUpdated::fromArray($data['chat_member']) : null;
            $object->chat_join_request = isset($data['chat_join_request']) ? ChatJoinRequest::fromArray($data['chat_join_request']) : null;
            $object->chat_boost = isset($data['chat_boost']) ? ChatBoostUpdated::fromArray($data['chat_boost']) : null;
            $object->removed_chat_boost = isset($data['removed_chat_boost']) ? ChatBoostRemoved::fromArray($data['removed_chat_boost']) : null;

            return $object;
        }
    }