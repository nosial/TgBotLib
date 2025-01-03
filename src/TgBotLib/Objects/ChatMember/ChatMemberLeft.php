<?php


    namespace TgBotLib\Objects\ChatMember;

    use TgBotLib\Enums\Types\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\User;

    class ChatMemberLeft extends ChatMember implements ObjectTypeInterface
    {
        private User $user;

        /**
         * Information about the user
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
                'status' => $this->status->value,
                'user' => $this->user->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatMemberLeft
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->status = ChatMemberStatus::LEFT;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;

            return $object;
        }
    }