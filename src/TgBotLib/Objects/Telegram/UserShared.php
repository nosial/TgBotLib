<?php

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class UserShared implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $request_id;

        /**
         * @var int
         */
        private $user_id;

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
         * Identifier of the shared user. This number may have more than 32 significant bits and some programming
         * languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits,
         * so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot may not
         * have access to the user and could be unable to use this identifier, unless the user is already known to
         * the bot by some other means.
         *
         * @return int
         */
        public function getUserId(): int
        {
            return $this->user_id;
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
                'user_id' => $this->user_id,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return UserShared
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->request_id = $data['request_id'];
            $object->user_id = $data['user_id'];

            return $object;
        }
    }