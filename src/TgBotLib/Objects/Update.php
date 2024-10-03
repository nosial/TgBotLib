<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\ChosenInlineResult;
    use TgBotLib\Objects\Inline\InlineQuery;

    class Update implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $update_id;

        /**
         * @var Message|null
         */
        private $message;

        /**
         * @var Message|null
         */
        private $edited_message;

        /**
         * @var Message|null
         */
        private $channel_post;

        /**
         * @var Message|null
         */
        private $edited_channel_post;

        /**
         * @var InlineQuery|null
         */
        private $inline_query;

        /**
         * @var ChosenInlineResult|null
         */
        private $chosen_inline_result;

        /**
         * @var CallbackQuery|null
         */
        private $callback_query;

        /**
         * @var ShippingQuery|null
         */
        private $shipping_query;

        /**
         * @var PreCheckoutQuery|null
         */
        private $pre_checkout_query;

        /**
         * @var Poll|null
         */
        private $poll;

        /**
         * @var PollAnswer|null
         */
        private $poll_answer;

        /**
         * @var ChatMemberUpdated|null
         */
        private $my_chat_member;

        /**
         * @var ChatMemberUpdated|null
         */
        private $chat_member;

        /**
         * @var ChatJoinRequest|null
         */
        private $chat_join_request;

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
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'update_id' => $this->update_id,
                'message' => ($this->message instanceof ObjectTypeInterface) ? $this->message->toArray() : null,
                'edited_message' => ($this->edited_message instanceof ObjectTypeInterface) ? $this->edited_message->toArray() : null,
                'channel_post' => ($this->channel_post instanceof ObjectTypeInterface) ? $this->channel_post->toArray() : null,
                'edited_channel_post' => ($this->edited_channel_post instanceof ObjectTypeInterface) ? $this->edited_channel_post->toArray() : null,
                'inline_query' => ($this->inline_query instanceof ObjectTypeInterface) ? $this->inline_query->toArray() : null,
                'chosen_inline_result' => ($this->chosen_inline_result instanceof ObjectTypeInterface) ? $this->chosen_inline_result->toArray() : null,
                'callback_query' => ($this->callback_query instanceof ObjectTypeInterface) ? $this->callback_query->toArray() : null,
                'shipping_query' => ($this->shipping_query instanceof ObjectTypeInterface) ? $this->shipping_query->toArray() : null,
                'pre_checkout_query' => ($this->pre_checkout_query instanceof ObjectTypeInterface) ? $this->pre_checkout_query->toArray() : null,
                'poll' => ($this->poll instanceof ObjectTypeInterface) ? $this->poll->toArray() : null,
                'poll_answer' => ($this->poll_answer instanceof ObjectTypeInterface) ? $this->poll_answer->toArray() : null,
                'my_chat_member' => ($this->my_chat_member instanceof ObjectTypeInterface) ? $this->my_chat_member->toArray() : null,
                'chat_member' => ($this->chat_member instanceof ObjectTypeInterface) ? $this->chat_member->toArray() : null,
                'chat_join_request' => ($this->chat_join_request instanceof ObjectTypeInterface) ? $this->chat_join_request->toArray() : null
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return Update
         */
        public static function fromArray(array $data): self
        {
            $object = new static();

            $object->update_id = $data['update_id'] ?? null;
            $object->message = isset($data['message']) ? Message::fromArray($data['message']) : null;
            $object->edited_message = isset($data['edited_message']) ? Message::fromArray($data['edited_message']) : null;
            $object->channel_post = isset($data['channel_post']) ? Message::fromArray($data['channel_post']) : null;
            $object->edited_channel_post = isset($data['edited_channel_post']) ? Message::fromArray($data['edited_channel_post']) : null;
            $object->inline_query = isset($data['inline_query']) ? InlineQuery::fromArray($data['inline_query']) : null;
            $object->chosen_inline_result = isset($data['chosen_inline_result']) ? ChosenInlineResult::fromArray($data['chosen_inline_result']) : null;
            $object->callback_query = isset($data['callback_query']) ? CallbackQuery::fromArray($data['callback_query']) : null;
            $object->shipping_query = isset($data['shipping_query']) ? ShippingQuery::fromArray($data['shipping_query']) : null;
            $object->pre_checkout_query = isset($data['pre_checkout_query']) ? PreCheckoutQuery::fromArray($data['pre_checkout_query']) : null;
            $object->poll = isset($data['poll']) ? Poll::fromArray($data['poll']) : null;
            $object->poll_answer = isset($data['poll_answer']) ? PollAnswer::fromArray($data['poll_answer']) : null;
            $object->my_chat_member = isset($data['my_chat_member']) ? ChatMemberUpdated::fromArray($data['my_chat_member']) : null;
            $object->chat_member = isset($data['chat_member']) ? ChatMemberUpdated::fromArray($data['chat_member']) : null;
            $object->chat_join_request = isset($data['chat_join_request']) ? ChatJoinRequest::fromArray($data['chat_join_request']) : null;

            return $object;
        }
    }