<?php

namespace TgBotLib\Objects;

use TgBotLib\Interfaces\ObjectTypeInterface;

class GiveawayCreated implements ObjectTypeInterface
{
    private int $prize_star_count;

    /**
     * Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only
     *
     * @return int
     */
    public function getPrizeStarCount(): int
    {
        return $this->prize_star_count;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'prize_star_count' => $this->prize_star_count
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?GiveawayCreated
    {
        if(!$data)
        {
            return null;
        }

        $object = new self();
        $object->prize_star_count = $data['prize_star_count'];
        return $object;
    }
}