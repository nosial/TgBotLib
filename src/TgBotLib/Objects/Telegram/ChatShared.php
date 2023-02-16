<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

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
         * Identifier of the request
         *
         * @return int
         */
        public function getRequestId(): int
        {
            return $this->request_id;
        }

        /**
         * Identifier of the shared chat. This number may have more than 32 significant bits and some programming
         * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits,
         * so a 64-bit integer or double-precision float type are safe for storing this identifier.
         * The bot may not have access to the chat and could be unable to use this identifier, unless the chat is
         * already known to the bot by some other means.
         *
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
         * @return ChatShared
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->request_id = $data['request_id'] ?? null;
            $object->chat_id = $data['chat_id'] ?? null;

            return $object;
        }
    }