<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ResponseParameters implements ObjectTypeInterface
    {
        private ?int $migrate_to_chat_id;
        private ?int $retry_after;

        /**
         * Optional. The group has been migrated to a supergroup with the specified identifier. This number may have
         * more than 32 significant bits and some programming languages may have difficulty/silent defects in
         * interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision
         * float type are safe for storing this identifier.
         *
         * @return int|null
         */
        public function getMigrateToChatId(): ?int
        {
            return $this->migrate_to_chat_id;
        }

        /**
         * Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be
         * repeated
         *
         * @return int|null
         */
        public function getRetryAfter(): ?int
        {
            return $this->retry_after;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'migrate_to_chat_id' => $this->migrate_to_chat_id,
                'retry_after' => $this->retry_after
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ResponseParameters
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->migrate_to_chat_id = $data['migrate_to_chat_id'] ?? null;
            $object->retry_after = $data['retry_after'] ?? null;

            return $object;
        }
    }