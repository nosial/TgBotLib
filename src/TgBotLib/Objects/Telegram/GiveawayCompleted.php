<?php

namespace TgBotLib\Objects\Telegram;

use TgBotLib\Interfaces\ObjectTypeInterface;

class GiveawayCompleted implements ObjectTypeInterface
{
    private int $winner_count;
    private ?int $unclaimed_prize_count;
    private ?Message $giveaway_message;
    private bool $is_star_giveaway;

    /**
     * Number of winners in the giveaway
     *
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    /**
     * Optional. Number of undistributed prizes
     *
     * @return int|null
     */
    public function getUnclaimedPrizeCount(): ?int
    {
        return $this->unclaimed_prize_count;
    }

    /**
     * Optional. Message with the giveaway that was completed, if it wasn't deleted
     *
     * @return Message|null
     */
    public function getGiveawayMessage(): ?Message
    {
        return $this->giveaway_message;
    }

    /**
     * Optional. True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the giveaway is a Telegram Premium giveaway.
     *
     * @return bool
     */
    public function isStarGiveaway(): bool
    {
        return $this->is_star_giveaway;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'winner_count' => $this->winner_count,
            'unclaimed_prize_count' => $this->unclaimed_prize_count,
            'giveaway_message' => $this->giveaway_message?->toArray(),
            'is_star_giveaway' => $this->is_star_giveaway
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        $object = new self();
        $object->winner_count = $data['winner_count'];
        $object->unclaimed_prize_count = $data['unclaimed_prize_count'] ?? null;
        $object->giveaway_message = isset($data['giveaway_message']) ? Message::fromArray($data['giveaway_message']) : null;
        $object->is_star_giveaway = $data['is_star_giveaway'] ?? false;
        return $object;
    }
}