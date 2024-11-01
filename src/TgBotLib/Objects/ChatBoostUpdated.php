<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatBoostUpdated implements ObjectTypeInterface
    {
        private Chat $chat;
        private ChatBoost $boost;

        public function getChat(): Chat
        {
            return $this->chat;
        }

        public function getBoost(): ChatBoost
        {
            return $this->boost;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'chat' => $this->chat->toArray(),
                'boost' => $this->boost->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatBoostUpdated
        {
            $object = new self();

            $object->chat = Chat::fromArray($data['chat']);
            $object->boost = ChatBoost::fromArray($data['boost']);

            return $object;
        }
    }