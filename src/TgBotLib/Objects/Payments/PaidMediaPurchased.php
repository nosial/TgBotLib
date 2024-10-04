<?php

    namespace TgBotLib\Objects\Payments;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\User;

    class PaidMediaPurchased implements ObjectTypeInterface
    {
        private User $from;
        private string $paid_media_payload;

        /**
         * User who purchased the media
         *
         * @return User
         */
        public function getFrom(): User
        {
            return $this->from;
        }

        /**
         * Bot-specified paid media payload
         *
         * @return string
         */
        public function getPaidMediaPayload(): string
        {
            return $this->paid_media_payload;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'from' => $this->from->toArray(),
                'paid_media_payload' => $this->paid_media_payload,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?PaidMediaPurchased
        {
            if (is_null($data))
            {
                return null;
            }

            $object = new self();
            $object->from = isset($data['from']) ? User::fromArray($data['from']) : null;
            $object->paid_media_payload = $data['paid_media_payload'];

            return $object;
        }
    }