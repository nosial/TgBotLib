<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoChatParticipantsInvited implements ObjectTypeInterface
    {
        /**
         * @var User[]
         */
        private array $users;

        /**
         * New members that were invited to the video chat
         *
         * @return User[]
         */
        public function getUsers(): array
        {
            return $this->users;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'users' => array_map(function (User $user)
                {
                    return $user->toArray();
                }, $this->users),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?VideoChatParticipantsInvited
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->users = array_map(function (array $user)
            {
                return User::fromArray($user);
            }, $data['users']);

            return $object;
        }
    }