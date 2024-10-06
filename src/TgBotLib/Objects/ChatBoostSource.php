<?php

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\ChatBoostSourceType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatBoostSource\ChatBoostSourceGiftCode;
    use TgBotLib\Objects\ChatBoostSource\ChatBoostSourceGiveaway;
    use TgBotLib\Objects\ChatBoostSource\ChatBoostSourcePremium;

    abstract class ChatBoostSource implements ObjectTypeInterface
    {
        protected ChatBoostSourceType $source;

        /**
         * Source of the boost
         *
         * @return ChatBoostSourceType
         */
        public function getSource(): ChatBoostSourceType
        {
            return $this->source;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): ?array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatBoostSource
        {
            if($data === null)
            {
                return null;
            }

            return match (ChatBoostSourceType::tryFrom($data['source']))
            {
                ChatBoostSourceType::GIFT_CODE => ChatBoostSourceGiftCode::fromArray($data),
                ChatBoostSourceType::PREMIUM => ChatBoostSourcePremium::fromArray($data),
                ChatBoostSourceType::GIVEAWAY => ChatBoostSourceGiveaway::fromArray($data),
                default => throw new InvalidArgumentException('Unknown source type')
            };
        }
    }