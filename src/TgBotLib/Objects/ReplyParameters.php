<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ReplyParameters implements ObjectTypeInterface
    {
        private int $message_id;
        private int|string|null $chat_id;
        private bool $allow_sending_without_reply;
        private ?string $quote;
        private ?ParseMode $quote_parse_mode;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $quote_entities;
        private ?int $quote_position;

        /**
         * ReplyParameters constructor.
         */
        public function __construct()
        {
            $this->message_id = 0;
            $this->chat_id = null;
            $this->allow_sending_without_reply = false;
            $this->quote = null;
            $this->quote_parse_mode = null;
            $this->quote_entities = null;
            $this->quote_position = null;
        }

        /**
         * Identifier of the message that will be replied to in the current chat,
         * or in the chat chat_id if it is specified
         *
         * @return int
         */
        public function getMessageId(): int
        {
            return $this->message_id;
        }

        /**
         * Sets the message id.
         *
         * @param int $messageId The unique identifier for the message.
         *
         * @return ReplyParameters Returns the current instance of the ReplyParameters class.
         */
        public function setMessageId(int $messageId): ReplyParameters
        {
            $this->message_id = $messageId;
            return $this;
        }

        /**
         * Optional. If the message to be replied to is from a different chat, unique identifier for the chat or
         * username of the channel (in the format @channelusername). Not supported for messages sent on behalf
         * of a business account.
         *
         * @return int|string|null
         */
        public function getChatId(): int|string|null
        {
            return $this->chat_id;
        }

        /**
         * Sets the chat id.
         *
         * @param int|string|null $chatId The unique identifier for the chat.
         * It can be an integer or string (which may be a username) or null.
         *
         * @return ?ReplyParameters Returns the current instance of the ReplyParameters class.
         */
        public function setChatId(int|string|null $chatId): ?ReplyParameters
        {
            $this->chat_id = $chatId;
            return $this;
        }

        /**
         * Optional. Pass True if the message should be sent even if the specified message to be replied to is
         * not found. Always False for replies in another chat or forum topic. Always True for messages sent on
         * behalf of a business account.
         *
         * @return bool
         */
        public function allowSendingWithoutReply(): bool
        {
            return $this->allow_sending_without_reply;
        }

        /**
         * Sets the value of allow_sending_without_reply
         *
         * @param bool $allow_sending_without_reply
         * @return ReplyParameters
         */
        public function setAllowSendingWithoutReply(bool $allow_sending_without_reply): ReplyParameters
        {
            $this->allow_sending_without_reply = $allow_sending_without_reply;
            return $this;
        }

        /**
         * Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing.
         * The quote must be an exact substring of the message to be replied to, including bold, italic, underline,
         * strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found
         * in the original message.
         *
         * @return string|null
         */
        public function getQuote(): ?string
        {
            return $this->quote;
        }

        /**
         * Sets the value of quote
         *
         * @param string|null $quote
         * @return ReplyParameters
         */
        public function setQuote(?string $quote): ReplyParameters
        {
            $this->quote = $quote;
            return $this;
        }

        /**
         * Optional. Mode for parsing entities in the quote. See formatting options for more details.
         *
         * @return ParseMode|null
         */
        public function getQuoteParseMode(): ?ParseMode
        {
            return $this->quote_parse_mode;
        }

        /**
         * Sets the value of quote_parse_mode
         *
         * @param ParseMode|null $quote_parse_mode
         * @return ReplyParameters
         */
        public function setQuoteParseMode(?ParseMode $quote_parse_mode): ReplyParameters
        {
            $this->quote_parse_mode = $quote_parse_mode;
            return $this;
        }

        /**
         * Optional. A list of special entities that appear in the quote. It can be specified
         * instead of quote_parse_mode.
         *
         * @return MessageEntity[]|null
         */
        public function getQuoteEntities(): ?array
        {
            return $this->quote_entities;
        }

        /**
         * Sets the value of quote_entities
         *
         * @param MessageEntity[]|null $quote_entities
         * @return ReplyParameters
         */
        public function setQuoteEntities(?array $quote_entities): ReplyParameters
        {
            $this->quote_entities = $quote_entities;
            return $this;
        }

        /**
         * Optional. Position of the quote in the original message in UTF-16 code units
         *
         * @return int|null
         */
        public function getQuotePosition(): ?int
        {
            return $this->quote_position;
        }

        /**
         * Sets the value of quote_position
         *
         * @param int|null $quote_position
         * @return ReplyParameters
         */
        public function setQuotePosition(?int $quote_position): ReplyParameters
        {
            $this->quote_position = $quote_position;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            $array = [
                'message_id' => $this->message_id,
                'allow_sending_without_reply' => $this->allow_sending_without_reply,
            ];

            if($this->chat_id !== null)
            {
                $array['chat_id'] = $this->chat_id;
            }

            if($this->quote !== null)
            {
                $array['quote'] = $this->quote;
            }

            if($this->quote_parse_mode !== null)
            {
                $array['quote_parse_mode'] = $this->quote_parse_mode->value;
            }

            if($this->quote_entities !== null)
            {
                $array['quote_entities'] = array_map(fn(MessageEntity $item) => $item->toArray(), $this->quote_entities);
            }

            if($this->quote_position !== null)
            {
                $array['quote_position'] = $this->quote_position;
            }

            return $array;
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ReplyParameters
        {
            if($data === null)
            {
                return null;
            }

            $object = new self;
            $object->message_id = $data['message_id'];
            $object->chat_id = $data['chat_id'];
            $object->allow_sending_without_reply = $data['allow_sending_without_reply'];
            $object->quote = $data['quote'];
            $object->quote_parse_mode = isset($data['quote_parse_mode']) ? ParseMode::tryFrom($data['quote_parse_mode']) : null;
            $object->quote_entities = array_map(fn(array $item) => MessageEntity::fromArray($item), $data['quote_entities']);
            $object->quote_position = $data['quote_position'];

            return $object;
        }
    }