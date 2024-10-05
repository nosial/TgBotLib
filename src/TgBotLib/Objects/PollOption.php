<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PollOption implements ObjectTypeInterface
    {
        private string $text;
        private int $voter_count;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'text' => $this->text,
                'voter_count' => $this->voter_count,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?PollOption
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->text = $data['text'] ?? null;
            $object->voter_count = $data['voter_count'] ?? null;

            return $object;
        }
    }