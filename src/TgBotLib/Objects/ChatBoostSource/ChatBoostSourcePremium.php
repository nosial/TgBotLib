<?php

    namespace TgBotLib\Objects\ChatBoostSource;

    use TgBotLib\Enums\Types\ChatBoostSourceType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatBoostSource;
    use TgBotLib\Objects\User;

    class ChatBoostSourcePremium extends ChatBoostSource implements ObjectTypeInterface
    {
        private User $user;

        /**
         * User that boosted the chat
         *
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'source' => $this->source->value,
                'user' => $this->user?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatBoostSourcePremium
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->source = ChatBoostSourceType::PREMIUM;
            $object->user = User::fromArray($data['user']);

            return $object;
        }
    }