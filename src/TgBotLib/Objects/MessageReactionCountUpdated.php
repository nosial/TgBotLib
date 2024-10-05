<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageReactionCountUpdated implements ObjectTypeInterface
    {
        private Chat $chat;
        private int $message_id;
        private int $date;
        /**
         * @var ReactionCount[]
         */
        private array $reaction_counts;

        /**
         * The chat containing the message
         *
         * @return Chat
         */
        public function getChat(): Chat
        {
            return $this->chat;
        }

        /**
         * Unique message identifier inside the chat
         *
         * @return int
         */
        public function getMessageId(): int
        {
            return $this->message_id;
        }

        /**
         * Date of the change in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * List of reactions that are present on the message
         *
         * @return ReactionCount[]
         */
        public function getReactionCounts(): array
        {
            return $this->reaction_counts;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'chat' => $this->chat->toArray(),
                'message_id' => $this->message_id,
                'date' => $this->date,
                'reaction_counts' => array_map(fn(ReactionCount $reaction_count) => $reaction_count->toArray(), $this->reaction_counts)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MessageReactionCountUpdated
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->chat = Chat::fromArray($data['chat']);
            $object->message_id = $data['message_id'];
            $object->date = $data['date'];
            $object->reaction_counts = array_map(fn($reaction_count) => ReactionCount::fromArray($reaction_count), $data['reaction_counts']);

            return $object;
        }
    }