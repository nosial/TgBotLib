<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatBoostRemoved implements ObjectTypeInterface
    {
        private Chat $chat;
        private string $boost_id;
        private int $remove_date;
        private ChatBoostSource $source;

        /**
         * Chat which was boosted
         *
         * @return Chat
         */
        public function getChat(): Chat
        {
            return $this->chat;
        }

        /**
         * Unique identifier of the boost
         *
         * @return string
         */
        public function getBoostId(): string
        {
            return $this->boost_id;
        }

        /**
         * Point in time (Unix timestamp) when the boost was removed
         *
         * @return int
         */
        public function getRemoveDate(): int
        {
            return $this->remove_date;
        }

        /**
         * Source of the removed boost
         *
         * @return ChatBoostSource
         */
        public function getSource(): ChatBoostSource
        {
            return $this->source;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'chat' => $this->chat->toArray(),
                'boost_id' => $this->boost_id,
                'remove_date' => $this->remove_date,
                'source' => $this->source->toArray(),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatBoostRemoved
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
            $object->boost_id = $data['boost_id'];
            $object->remove_date = $data['remove_date'];
            $object->source = isset($data['source']) ? ChatBoostSource::fromArray($data['source']) : null;

            return $object;
        }
    }