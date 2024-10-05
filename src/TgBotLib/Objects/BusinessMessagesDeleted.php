<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BusinessMessagesDeleted implements ObjectTypeInterface
    {
        private string $business_connection_id;
        private Chat $chat;

        /**
         * @var int[]
         */
        private array $message_ids;

        /**
         * Unique identifier of the business connection
         *
         * @return string
         */
        public function getBusinessConnectionId(): string
        {
            return $this->business_connection_id;
        }

        /**
         * Information about a chat in the business account.
         * The bot may not have access to the chat or the corresponding user.
         *
         * @return Chat
         */
        public function getChat(): Chat
        {
            return $this->chat;
        }

        /**
         * The list of identifiers of deleted messages in the chat of the business account
         *
         * @return int[]
         */
        public function getMessageIds(): array
        {
            return $this->message_ids;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'business_connection_id' => $this->business_connection_id,
                'chat' => $this->chat?->toArray(),
                'message_ids' => $this->message_ids
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BusinessMessagesDeleted
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->business_connection_id = $data['business_connection_id'] ?? null;
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
            $object->message_ids = $data['message_ids'] ?? [];

            return $object;
        }
    }