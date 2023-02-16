<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InlineQuery implements ObjectTypeInterface
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
         * @var string
         */
        private $query;

        /**
         * @var string
         */
        private $offset;

        /**
         * @var string|null
         */
        private $chat_type;

        /**
         * @var Location|null
         */
        private $location;

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
         * Text of the query (up to 256 characters)
         *
         * @return string
         */
        public function getQuery(): string
        {
            return $this->query;
        }

        /**
         * Offset of the results to be returned, can be controlled by the bot
         *
         * @return string
         */
        public function getOffset(): string
        {
            return $this->offset;
        }

        /**
         * Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat
         * with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always
         * known for requests sent from official clients and most third-party clients, unless the request was sent from
         * a secret chat
         *
         * @return string|null
         */
        public function getChatType(): ?string
        {
            return $this->chat_type;
        }

        /**
         * Optional. Sender location, only for bots that request user location
         *
         * @return Location|null
         */
        public function getLocation(): ?Location
        {
            return $this->location;
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
                'from' => ($this->from instanceof ObjectTypeInterface) ? $this->from->toArray() : $this->from,
                'query' => $this->query,
                'offset' => $this->offset,
                'chat_type' => $this->chat_type,
                'location' => ($this->location instanceof ObjectTypeInterface) ? $this->location->toArray() : $this->location,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return InlineQuery
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->id = $data['id'];
            $object->from = isset($data['from']) && is_array($data['from']) ? User::fromArray($data['from']) : $data['from'];
            $object->query = $data['query'];
            $object->offset = $data['offset'];
            $object->chat_type = $data['chat_type'] ?? null;
            $object->location = isset($data['location']) && is_array($data['location']) ? Location::fromArray($data['location']) : $data['location'];

            return $object;
        }
    }