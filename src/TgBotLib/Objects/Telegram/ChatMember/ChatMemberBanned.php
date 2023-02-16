<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\ChatMember;

    use TgBotLib\Abstracts\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\ChatMember;
    use TgBotLib\Objects\Telegram\User;

    class ChatMemberBanned implements ObjectTypeInterface
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
         * @var int
         */
        private $until_date;

        /**
         * The member's status in the chat, always “kicked”
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
         * Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever
         *
         * @return int
         */
        public function getUntilDate(): int
        {
            return $this->until_date;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'status' => $this->status,
                'user' => ($this->user instanceof ObjectTypeInterface) ? $this->user->toArray() : $this->user,
                'until_date' => $this->until_date
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ChatMemberBanned
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->status = $data['status'] ?? ChatMemberStatus::Kicked;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->until_date = $data['until_date'] ?? null;

            return $object;
        }

        /**
         * Constructs object from a ChatMember object
         *
         * @param ChatMember $chatMember
         * @return ChatMemberBanned
         */
        public static function fromChatMember(ChatMember $chatMember): ChatMemberBanned
        {
            $object = new self();

            $object->status = $chatMember->getStatus();
            $object->user = $chatMember->getUser();
            $object->until_date = $chatMember->getUntilDate();

            return $object;
        }
    }