<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline;

    use TgBotLib\Enums\Types\ChatType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Location;
    use TgBotLib\Objects\User;

    class InlineQuery implements ObjectTypeInterface
    {
        private string $id;
        private User $from;
        private string $query;
        private string $offset;
        private ?ChatType $chat_type;
        private ?Location $location;

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
         * @return ChatType|null
         */
        public function getChatType(): ?ChatType
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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'id' => $this->id,
                'from' => $this->from?->toArray(),
                'query' => $this->query,
                'offset' => $this->offset,
                'chat_type' => $this->chat_type?->value,
                'location' => $this->location?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQuery
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->id = $data['id'];
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->query = $data['query'];
            $object->offset = $data['offset'];
            $object->chat_type = $data['chat_type'] ?? null;
            $object->location = isset($data['location']) ? Location::fromArray($data['location']) : null;

            return $object;
        }
    }