<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class KeyboardButtonRequestUser implements ObjectTypeInterface
    {
        private int $request_id;
        private bool $user_is_bot;
        private bool $user_is_premium;

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
         * @inheritDoc
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
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?KeyboardButtonRequestUser
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->request_id = $data['request_id'] ?? null;
            $object->user_is_bot = $data['user_is_bot'] ?? false;
            $object->user_is_premium = $data['user_is_premium'] ?? false;

            return $object;
        }
    }