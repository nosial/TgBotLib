<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatParticipantsInvited implements ObjectTypeInterface
    {
        /**
         * @var User[]
         */
        private $users;

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'users' => array_map(function (User $user) {
                    return $user->toArray();
                }, $this->users),
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return VideoChatParticipantsInvited
         */
        public static function fromArray(array $data): self
        {
            $object = new self();
            $object->users = array_map(function (array $user) {
                return User::fromArray($user);
            }, $data['users']);
            return $object;
        }
    }