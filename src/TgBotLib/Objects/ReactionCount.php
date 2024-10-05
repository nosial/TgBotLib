<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\ReactionTypes;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ReactionCount implements ObjectTypeInterface
    {
        private ReactionTypes $type;
        private int $total_count;

        /**
         * Type of the reaction
         *
         * @return ReactionTypes
         */
        public function getType(): ReactionTypes
        {
            return $this->type;
        }

        /**
         * Number of times the reaction was added
         *
         * @return int
         */
        public function getTotalCount(): int
        {
            return $this->total_count;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'total_count' => $this->total_count
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ReactionCount
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = ReactionTypes::tryFrom($data['type']);
            $object->total_count = $data['total_count'];

            return $object;
        }
    }