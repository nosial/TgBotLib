<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatInviteLink implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $invite_link;

        /**
         * @var User
         */
        private $creator;

        /**
         * @var bool
         */
        private $creates_join_request;

        /**
         * @var bool
         */
        private $is_primary;

        /**
         * @var bool
         */
        private $is_revoked;

        /**
         * @var string
         */
        private $name;

        /**
         * @var int|null
         */
        private $expire_date;

        /**
         * @var int|null
         */
        private $member_limit;

        /**
         * @var int|null
         */
        private $pending_join_request_count;

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'invite_link' => $this->invite_link,
                'creator' => ($this->creator instanceof ObjectTypeInterface) ? $this->creator->toArray() : null,
                'creates_join_request' => $this->creates_join_request ?? false,
                'is_primary' => $this->is_primary ?? false,
                'is_revoked' => $this->is_revoked ?? false,
                'name' => $this->name,
                'expire_date' => $this->expire_date,
                'member_limit' => $this->member_limit, 'pending_join_request_count' => $this->pending_join_request_count
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
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

            return $object;
        }
    }