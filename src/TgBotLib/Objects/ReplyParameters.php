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
         * Optional. Pass True if the message should be sent even if the specified message to be replied to is
         * not found. Always False for replies in another chat or forum topic. Always True for messages sent on
         * behalf of a business account.
         *
         * @return bool
         */
        public function isAllowSendingWithoutReply(): bool
        {
            return $this->allow_sending_without_reply;
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
         * Optional. Mode for parsing entities in the quote. See formatting options for more details.
         *
         * @return ParseMode|null
         */
        public function getQuoteParseMode(): ?ParseMode
        {
            return $this->quote_parse_mode;
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
         * Optional. Position of the quote in the original message in UTF-16 code units
         *
         * @return int|null
         */
        public function getQuotePosition(): ?int
        {
            return $this->quote_position;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'message_id' => $this->message_id,
                'chat_id' => $this->chat_id,
                'allow_sending_without_reply' => $this->allow_sending_without_reply,
                'quote' => $this->quote,
                'quote_parse_mode' => $this->quote_parse_mode?->value,
                'quote_entities' => array_map(fn(MessageEntity $item) => $item->toArray(), $this->quote_entities),
                'quote_position' => $this->quote_position,
            ];
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