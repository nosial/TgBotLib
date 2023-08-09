<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\ChatMember;

    use TgBotLib\Enums\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\ChatMember;
    use TgBotLib\Objects\Telegram\User;

    class ChatMemberMember implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $status;

        /**
         * @var User
         */
        private $user;

        /**
         * The member's status in the chat, always “member”
         *
         * @return string
         */
        public function getStatus(): string
        {
            return $this->status;
        }

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'status' => $this->getStatus(),
                'user' => ($this->user instanceof ObjectTypeInterface) ? $this->user->toArray() : $this->user,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ChatMemberMember
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->status = $data['status'] ?? ChatMemberStatus::MEMBER;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;

            return $object;
        }

        /**
         * Constructs object from ChatMember object
         *
         * @param ChatMember $chatMember
         * @return static
         */
        public static function fromChatMember(ChatMember $chatMember): self
        {
            $object = new self();

            $object->status = $chatMember->getStatus();
            $object->user = $chatMember->getUser();

            return $object;
        }
    }