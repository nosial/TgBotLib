<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\ChatMember;

    use TgBotLib\Enums\Types\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatMember;
    use TgBotLib\Objects\User;

    class ChatMemberBanned extends ChatMember implements ObjectTypeInterface
    {
        private User $user;
        private int $until_date;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'status' => $this->status->value,
                'user' => $this->user?->toArray(),
                'until_date' => $this->until_date
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatMemberBanned
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->status = ChatMemberStatus::KICKED;
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->until_date = $data['until_date'] ?? null;

            return $object;
        }
    }