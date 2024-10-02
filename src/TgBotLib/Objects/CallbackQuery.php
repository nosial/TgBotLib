<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class CallbackQuery implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $id;

        /**
         * @var User
         */
        private $from;

        /**
         * @var Message|null
         */
        private $message;

        /**
         * @var string|null
         */
        private $inline_message_id;

        /**
         * @var string
         */
        private $chat_instance;

        /**
         * @var string|null
         */
        private $data;

        /**
         * @var string|null
         */
        private $game_short_name;

        /**
         * Unique identifier for this query
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Sender
         *
         * @return User
         */
        public function getFrom(): User
        {
            return $this->from;
        }

        /**
         * Optional. Message with the callback button that originated the query. Note that message content and message
         * date will not be available if the message is too old
         *
         * @return Message|null
         */
        public function getMessage(): ?Message
        {
            return $this->message;
        }

        /**
         * Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
         *
         * @return string|null
         */
        public function getInlineMessageId(): ?string
        {
            return $this->inline_message_id;
        }

        /**
         * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
         * Useful for high scores in games.
         *
         * @see https://core.telegram.org/bots/api#games
         * @return string
         */
        public function getChatInstance(): string
        {
            return $this->chat_instance;
        }

        /**
         * Optional. Data associated with the callback button. Be aware that the message originated the query
         * can contain no callback buttons with this data.
         *
         * @return string|null
         */
        public function getData(): ?string
        {
            return $this->data;
        }

        /**
         * Optional. Short name of a Game to be returned, serves as the unique identifier for the game
         *
         * @see https://core.telegram.org/bots/api#games
         * @return string|null
         */
        public function getGameShortName(): ?string
        {
            return $this->game_short_name;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'from' => ($this->from instanceof ObjectTypeInterface) ? $this->from->toArray() : null,
                'message' => ($this->message instanceof ObjectTypeInterface) ? $this->message->toArray() : null,
                'inline_message_id' => $this->inline_message_id,
                'chat_instance' => $this->chat_instance,
                'data' => $this->data,
                'game_short_name' => $this->game_short_name,
            ];
        }

        /**
         * Constructs CallbackQuery object from an array representation
         *
         * @param array $data
         * @return CallbackQuery
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->id = $data['id'] ?? null;
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->message = isset($data['message']) ? Message::fromArray($data['message']) : null;
            $object->inline_message_id = $data['inline_message_id'] ?? null;
            $object->chat_instance = $data['chat_instance'] ?? null;
            $object->data = $data['data'] ?? null;
            $object->game_short_name = $data['game_short_name'] ?? null;

            return $object;
        }
    }