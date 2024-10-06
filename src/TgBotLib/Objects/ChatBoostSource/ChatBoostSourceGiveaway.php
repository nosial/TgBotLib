<?php

    namespace TgBotLib\Objects\ChatBoostSource;

    use TgBotLib\Enums\Types\ChatBoostSourceType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatBoostSource;
    use TgBotLib\Objects\User;

    class ChatBoostSourceGiveaway extends ChatBoostSource implements ObjectTypeInterface
    {
        private int $giveaway_message_id;
        private ?User $user;
        private ?int $prize_star_count;
        private bool $is_unclaimed;

        /**
         * Identifier of a message in the chat with the giveaway; the message could have been deleted already.
         * May be 0 if the message isn't sent yet.
         *
         * @return int
         */
        public function getGiveawayMessageId(): int
        {
            return $this->giveaway_message_id;
        }

        /**
         * Optional. User that won the prize in the giveaway if any; for Telegram Premium giveaways only
         *
         * @return User|null
         */
        public function getUser(): ?User
        {
            return $this->user;
        }

        /**
         * Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
         *
         * @return int|null
         */
        public function getPrizeStarCount(): ?int
        {
            return $this->prize_star_count;
        }

        /**
         * Optional. True, if the giveaway was completed, but there was no user to win the prize
         *
         * @return bool
         */
        public function isIsUnclaimed(): bool
        {
            return $this->is_unclaimed;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'source' => $this->source->value,
                'giveaway_message_id' => $this->giveaway_message_id,
                'user' => $this->user?->toArray(),
                'prize_star_count' => $this->prize_star_count,
                'is_unclaimed' => $this->is_unclaimed
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatBoostSourceGiveaway
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->source = ChatBoostSourceType::GIVEAWAY;
            $object->giveaway_message_id = $data['giveaway_message_id'];
            $object->user = User::fromArray($data['user']);
            $object->prize_star_count = $data['prize_star_count'];
            $object->is_unclaimed = $data['is_unclaimed'];

            return $object;
        }
    }