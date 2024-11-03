<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatInviteLink implements ObjectTypeInterface
    {
        private string $invite_link;
        private User $creator;
        private bool $creates_join_request;
        private bool $is_primary;
        private bool $is_revoked;
        private string $name;
        private ?int $expire_date;
        private ?int $member_limit;
        private ?int $pending_join_request_count;
        private ?int $subscription_period;
        private ?int $subscription_price;

        /**
         * The invite link. If the link was created by another chat administrator, then the second part of the link
         * will be replaced with “…”.
         *
         * @return string
         */
        public function getInviteLink(): string
        {
            return $this->invite_link;
        }

        /**
         * Creator of the link
         *
         * @return User
         */
        public function getCreator(): User
        {
            return $this->creator;
        }

        /**
         * True, if users joining the chat via the link need to be approved by chat administrators
         *
         * @return bool
         */
        public function createsJoinRequest(): bool
        {
            return $this->creates_join_request;
        }

        /**
         * True, if the link is primary
         *
         * @return bool
         */
        public function isPrimary(): bool
        {
            return $this->is_primary;
        }

        /**
         * True, if the link is revoked
         *
         * @return bool
         */
        public function isRevoked(): bool
        {
            return $this->is_revoked;
        }

        /**
         * Optional. Invite link name
         *
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * Optional. Point in time (Unix timestamp) when the link will expire or has been expired
         *
         * @return int|null
         */
        public function getExpireDate(): ?int
        {
            return $this->expire_date;
        }

        /**
         * Optional. The maximum number of users that can be members of the chat simultaneously after joining the
         * chat via this invite link; 1-99999
         *
         * @return int|null
         */
        public function getMemberLimit(): ?int
        {
            return $this->member_limit;
        }

        /**
         * Optional. Number of pending join requests created using this link
         *
         * @return int|null
         */
        public function getPendingJoinRequestCount(): ?int
        {
            return $this->pending_join_request_count;
        }

        /**
         * Optional. The number of seconds the subscription will be active for before the next payment
         *
         * @return int|null
         */
        public function getSubscriptionPeriod(): ?int
        {
            return $this->subscription_period;
        }

        /**
         * Optional. The amount of Telegram Stars a user must pay initially and after each subsequent subscription
         * period to be a member of the chat using the link
         *
         * @return int|null
         */
        public function getSubscriptionPrice(): ?int
        {
            return $this->subscription_price;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'invite_link' => $this->invite_link,
                'creator' => $this->creator->toArray(),
                'creates_join_request' => $this->creates_join_request ?? false,
                'is_primary' => $this->is_primary ?? false,
                'is_revoked' => $this->is_revoked ?? false,
                'name' => $this->name,
                'expire_date' => $this->expire_date,
                'member_limit' => $this->member_limit,
                'pending_join_request_count' => $this->pending_join_request_count,
                'subscription_period' => $this->subscription_period,
                'subscription_price' => $this->subscription_price
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ChatInviteLink
        {
            $object = new self();

            $object->invite_link = $data['invite_link'] ?? null;
            $object->creator = isset($data['creator']) ? User::fromArray($data['creator']) : null;
            $object->creates_join_request = $data['creates_join_request'] ?? null;
            $object->is_primary = $data['is_primary'] ?? null;
            $object->is_revoked = $data['is_revoked'] ?? null;
            $object->name = $data['name'] ?? null;
            $object->expire_date = $data['expire_date'] ?? null;
            $object->member_limit = $data['member_limit'] ?? null;
            $object->pending_join_request_count = $data['pending_join_request_count'] ?? null;
            $object->subscription_period = $data['subscription_period'] ?? null;
            $object->subscription_price = $data['subscription_price'] ?? null;

            return $object;
        }
    }