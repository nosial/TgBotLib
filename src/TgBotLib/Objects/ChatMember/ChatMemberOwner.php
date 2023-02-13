<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\ChatMember;

    use TgBotLib\Abstracts\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\User;

    class ChatMemberOwner implements ObjectTypeInterface
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
         * @var bool
         */
        private $is_anonymous;

        /**
         * @var string|null
         */
        private $custom_title;

        /**
         * The member's status in the chat, always “creator”
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
         * True, if the user's presence in the chat is hidden
         *
         * @return bool
         */
        public function isIsAnonymous(): bool
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
         * Returns an array representation of this object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'status' => $this->status,
                'user' => ($this->user instanceof ObjectTypeInterface) ? $this->user->toArray() : $this->user,
                'is_anonymous' => $this->is_anonymous,
                'custom_title' => $this->custom_title
            ];
        }

        /**
         * Constructs ChatMemberOwner object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new ChatMemberOwner();
            $object->status = $data['status'] ?? ChatMemberStatus::Creator;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->is_anonymous = $data['is_anonymous'] ?? false;
            $object->custom_title = $data['custom_title'] ?? null;
            return $object;
        }

        /**
         * Constructs ChatMemberOwner object from ChatMember object
         *
         * @param ChatMember $chatMember
         * @return ChatMemberOwner
         */
        public static function fromChatMember(ChatMember $chatMember): ChatMemberOwner
        {
            $object = new ChatMemberOwner();
            $object->status = $chatMember->getStatus();
            $object->user = $chatMember->getUser();
            $object->is_anonymous = $chatMember->isIsAnonymous();
            $object->custom_title = $chatMember->getCustomTitle();
            return $object;
        }
    }