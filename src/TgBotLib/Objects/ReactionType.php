<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\ReactionTypes;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    abstract class ReactionType implements ObjectTypeInterface
    {
        protected ReactionTypes $type;

        /**
         * @inheritDoc
         */
        public abstract function toArray(): ?array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ReactionType
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new \InvalidArgumentException('Type is not provided');
            }

            return match(ReactionTypes::tryFrom($data['type']))
            {
                ReactionTypes::EMOJI => ReactionType\ReactionTypeEmoji::fromArray($data),
                ReactionTypes::CUSTOM_EMOJI => ReactionType\ReactionTypeCustomEmoji::fromArray($data),
                ReactionTypes::PAID => ReactionType\ReactionTypePaid::fromArray($data),
                default => throw new \InvalidArgumentException('Unknown type')
            };
        }
    }