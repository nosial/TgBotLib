<?php

namespace TgBotLib\Objects;

use TgBotLib\Interfaces\ObjectTypeInterface;

class GiveawayWinners implements ObjectTypeInterface
{
    private Chat $chat;
    private int $giveaway_message_id;
    private int $winners_selection_date;
    private int $winner_count;
    /**
     * @var User[]
     */
    private array $winners;
    private ?int $additional_chat_count;
    private ?int $prize_star_count;
    private ?int $premium_subscription_month_count;
    private ?int $unclaimed_prize_count;
    private bool $only_new_members;
    private bool $was_refunded;
    private ?string $prize_description;

    /**
     * The chat that created the giveaway
     *
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * Identifier of the message with the giveaway in the chat
     *
     * @return int
     */
    public function getGiveawayMessageId(): int
    {
        return $this->giveaway_message_id;
    }

    /**
     * Point in time (Unix timestamp) when winners of the giveaway were selected
     *
     * @return int
     */
    public function getWinnersSelectionDate(): int
    {
        return $this->winners_selection_date;
    }

    /**
     * Total number of winners in the giveaway
     *
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winner_count;
    }

    /**
     * List of up to 100 winners of the giveaway
     *
     * @return User[]
     */
    public function getWinners(): array
    {
        return $this->winners;
    }

    /**
     * Optional. The number of other chats the user had to join in order to be eligible for the giveaway
     *
     * @return int|null
     */
    public function getAdditionalChatCount(): ?int
    {
        return $this->additional_chat_count;
    }

    /**
     * Optional. The number of Telegram Stars that were split between giveaway winners; for Telegram Star giveaways only
     *
     * @return int|null
     */
    public function getPrizeStarCount(): ?int
    {
        return $this->prize_star_count;
    }

    /**
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for; for Telegram Premium giveaways only
     *
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount(): ?int
    {
        return $this->premium_subscription_month_count;
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
     * Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
     *
     * @return bool
     */
    public function isOnlyNewMembers(): bool
    {
        return $this->only_new_members;
    }

    /**
     * Optional. True, if the giveaway was canceled because the payment for it was refunded
     *
     * @return bool
     */
    public function isWasRefunded(): bool
    {
        return $this->was_refunded;
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
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'chat' => $this->chat->toArray(),
            'giveaway_message_id' => $this->giveaway_message_id,
            'winners_selection_date' => $this->winners_selection_date,
            'winner_count' => $this->winner_count,
            'winners' => array_map(fn(User $user) => $user->toArray(), $this->winners),
            'additional_chat_count' => $this->additional_chat_count,
            'prize_star_count' => $this->prize_star_count,
            'premium_subscription_month_count' => $this->premium_subscription_month_count,
            'unclaimed_prize_count' => $this->unclaimed_prize_count,
            'only_new_members' => $this->only_new_members,
            'was_refunded' => $this->was_refunded,
            'prize_description' => $this->prize_description,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?GiveawayWinners
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->chat = Chat::fromArray($data['chat']);
        $object->giveaway_message_id = $data['giveaway_message_id'];
        $object->winners_selection_date = $data['winners_selection_date'];
        $object->winner_count = $data['winner_count'];
        $object->winners = array_map(fn(array $user) => User::fromArray($user), $data['winners']);
        $object->additional_chat_count = $data['additional_chat_count'] ?? null;
        $object->prize_star_count = $data['prize_star_count'] ?? null;
        $object->premium_subscription_month_count = $data['premium_subscription_month_count'] ?? null;
        $object->unclaimed_prize_count = $data['unclaimed_prize_count'] ?? null;
        $object->only_new_members = $data['only_new_members'] ?? false;
        $object->was_refunded = $data['was_refunded'] ?? false;
        $object->prize_description = $data['prize_description'] ?? null;

        return $object;
    }
}