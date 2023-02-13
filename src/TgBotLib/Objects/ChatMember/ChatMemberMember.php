<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\ChatMember;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\User;

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
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->status = $data['status'];
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;

            return $object;
        }
    }