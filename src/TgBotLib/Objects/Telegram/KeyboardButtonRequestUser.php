<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class KeyboardButtonRequestUser implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $request_id;

        /**
         * @var bool
         */
        private $user_is_bot;

        /**
         * @var bool
         */
        private $user_is_premium;

        /**
         * Signed 32-bit identifier of the request, which will be received back in the
         * UserShared object. Must be unique within the message
         *
         * @see https://core.telegram.org/bots/api#usershared
         * @return int
         */
        public function getRequestId(): int
        {
            return $this->request_id;
        }

        /**
         * Optional. Pass True to request a bot, pass False to request a regular user.
         * If not specified, no additional restrictions are applied.
         *
         * @return bool
         */
        public function isUserIsBot(): bool
        {
            return $this->user_is_bot;
        }

        /**
         * Optional. Pass True to request a premium user, pass False to request a non-premium user.
         * If not specified, no additional restrictions are applied.
         *
         * @return bool
         */
        public function isUserIsPremium(): bool
        {
            return $this->user_is_premium;
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
                'user_is_bot' => $this->user_is_bot,
                'user_is_premium' => $this->user_is_premium,
            ];
        }

        /**
         * Constructs object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->request_id = $data['request_id'] ?? null;
            $object->user_is_bot = $data['user_is_bot'] ?? false;
            $object->user_is_premium = $data['user_is_premium'] ?? false;

            return $object;
        }
    }