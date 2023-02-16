<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PollAnswer implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $poll_id;

        /**
         * @var User
         */
        private $user;

        /**
         * @var int[]
         */
        private $option_ids;

        /**
         * Unique poll identifier
         *
         * @return string
         */
        public function getPollId(): string
        {
            return $this->poll_id;
        }

        /**
         * The user, who changed the answer to the poll
         *
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote.
         *
         * @return int[]
         */
        public function getOptionIds(): array
        {
            return $this->option_ids;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'poll_id' => $this->poll_id,
                'user' => ($this->user instanceof ObjectTypeInterface) ? $this->user->toArray() : null,
                'option_ids' => $this->option_ids,
            ];
        }

        /**
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return PollAnswer
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->poll_id = $data['poll_id'] ?? null;
            $object->user = isset($data['user']) && is_array($data['user']) ? User::fromArray($data['user']) : null;
            $object->option_ids = $data['option_ids'];

            return $object;
        }
    }