<?php

    namespace TgBotLib\Objects\ReactionType;

    use TgBotLib\Enums\Types\ReactionTypes;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ReactionType;

    class ReactionTypePaid extends ReactionType implements ObjectTypeInterface
    {
        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ReactionType
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = ReactionTypes::PAID;

            return $object;
        }
    }