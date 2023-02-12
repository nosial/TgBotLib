<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PollOption implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $text;

        /**
         * @var int
         */
        private $voter_count;

        /**
         * Option text, 1-100 characters
         *
         * @return string
         */
        public function getText(): string
        {
            return $this->text;
        }

        /**
         * Number of users that voted for this option
         *
         * @return int
         */
        public function getVoterCount(): int
        {
            return $this->voter_count;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'text' => $this->text,
                'voter_count' => $this->voter_count,
            ];
        }

        /**
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->text = $data['text'];
            $object->voter_count = $data['voter_count'];

            return $object;
        }
    }