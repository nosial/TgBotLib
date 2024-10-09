<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class UserChatBoosts implements ObjectTypeInterface
    {
        /**
         * @var ChatBoost[]
         */
        private array $boosts;

        /**
         * The list of boosts added to the chat by the user
         *
         * @return ChatBoost[]
         */
        public function getBoosts(): array
        {
            return $this->boosts;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'boosts' => array_map(fn(ChatBoost $item) => $item->toArray(), $this->boosts)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?UserChatBoosts
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->boosts = array_map(fn(array $item) => ChatBoost::fromArray($item), $data['boosts']);

            return $object;
        }
    }