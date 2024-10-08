<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageId implements ObjectTypeInterface
    {
        private int $message_id;

        /**
         * Unique message identifier
         *
         * @return int
         */
        public function getMessageId(): int
        {
            return $this->message_id;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'message_id' => $this->message_id
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MessageId
        {
            if (empty($data))
            {
                return null;
            }

            $object = new self();
            $object->message_id = $data['message_id'];

            return $object;
        }
    }