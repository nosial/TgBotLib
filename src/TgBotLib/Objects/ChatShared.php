<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatShared implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $request_id;

        /**
         * @var int
         */
        private $chat_id;

        /**
         * @return int
         */
        public function getRequestId(): int
        {
            return $this->request_id;
        }

        /**
         * @return int
         */
        public function getChatId(): int
        {
            return $this->chat_id;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'request_id' => $this->request_id,
                'chat_id' => $this->chat_id,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->request_id = @$data['request_id'];
            $object->chat_id = @$data['chat_id'];

            return $object;
        }
    }