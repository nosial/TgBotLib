<?php


    namespace TgBotLib\Objects\ChatMember;

    use TgBotLib\Enums\Types\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\User;

    class ChatMemberOwner extends ChatMember implements ObjectTypeInterface
    {
        private User $user;
        private bool $is_anonymous;
        private ?string $custom_title;

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
         * True, if the user's presence in the chat is hidden
         *
         * @return bool
         */
        public function isAnonymous(): bool
        {
            return $this->is_anonymous;
        }

        /**
         * Optional. Custom title for this user
         *
         * @return string|null
         */
        public function getCustomTitle(): ?string
        {
            return $this->custom_title;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'status' => $this->status->value,
                'user' => $this->user->toArray(),
                'is_anonymous' => $this->is_anonymous,
                'custom_title' => $this->custom_title
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatMemberOwner
        {
            if($data === null)
            {
                return null;
            }

            $object = new ChatMemberOwner();
            $object->status = ChatMemberStatus::CREATOR;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->is_anonymous = $data['is_anonymous'] ?? false;
            $object->custom_title = $data['custom_title'] ?? null;

            return $object;
        }
    }