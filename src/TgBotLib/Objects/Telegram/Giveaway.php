<?php

namespace TgBotLib\Objects\Telegram;

use TgBotLib\Interfaces\ObjectTypeInterface;

class Giveaway implements ObjectTypeInterface
{
    /**
     * @var Chat[]
     */
    private array $chats;
    private int $winners_selection_date;
    private int $winner_count;
    private bool $only_new_members;
    private bool $has_public_winners;
    private ?string $prize_description;
    /**
     * @var string[]|null
     */
    private ?array $country_codes;
    private ?int $prize_star_count;
    private ?int $premium_subscription_month_count;

    /**
     * The list of chats which the user must join to participate in the giveaway
     *
     * @return Chat[]
     */
    public function getChats(): array
    {
        return $this->chats;
    }

    /**
     * Point in time (Unix timestamp) when winners of the giveaway will be selected
     *
     * @return int
     */
    public function getWinnersSelectionDate(): int
    {
        return $this->winners_selection_date;
    }

    /**
     * The number of users which are supposed to be selected as winners of the giveaway
     *
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    /**
     * Optional. True, if only users who join the chats after the giveaway started should be eligible to win
     *
     * @return bool
     */
    public function isOnlyNewMembers(): bool
    {
        return $this->only_new_members;
    }

    /**
     * Optional. True, if the list of giveaway winners will be visible to everyone
     *
     * @return bool
     */
    public function isHasPublicWinners(): bool
    {
        return $this->has_public_winners;
    }

    /**
     * Optional. Description of additional giveaway prize
     *
     * @return string|null
     */
    public function getPrizeDescription(): ?string
    {
        return $this->prize_description;
    }

    /**
     * Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible
     * users for the giveaway must come. If empty, then all users can participate in the giveaway. Users with
     * a phone number that was bought on Fragment can always participate in giveaways.
     *
     * @return string[]|null
     */
    public function getCountryCodes(): ?array
    {
        return $this->country_codes;
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
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be
     * active for; for Telegram Premium giveaways only
     *
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount(): ?int
    {
        return $this->premium_subscription_month_count;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'chats' => array_map(fn(Chat $chat) => $chat->toArray(), $this->chats),
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'only_new_members' => $this->only_new_members,
            'has_public_winners' => $this->has_public_winners,
            'prize_description' => $this->prize_description,
            'country_codes' => $this->country_codes,
            'prize_star_count' => $this->prize_star_count,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        $object = new self();

        $object->chats = array_map(fn(array $chat) => Chat::fromArray($chat), $data['chats']);
        $object->winners_selection_date = $data['winners_selection_date'];
        $object->winner_count = $data['winner_count'];
        $object->only_new_members = $data['only_new_members'] ?? false;
        $object->has_public_winners = $data['has_public_winners'] ?? false;
        $object->prize_description = $data['prize_description'] ?? null;
        $object->country_codes = $data['country_codes'] ?? null;
        $object->prize_star_count = $data['prize_star_count'] ?? null;
        $object->premium_subscription_month_count = $data['premium_subscription_month_count'] ?? null;

        return $object;
    }
}