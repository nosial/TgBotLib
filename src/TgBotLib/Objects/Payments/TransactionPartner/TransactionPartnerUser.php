<?php

    namespace TgBotLib\Objects\Payments\TransactionPartner;

    use TgBotLib\Enums\Types\TransactionPartnerType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\PaidMedia;
    use TgBotLib\Objects\Payments\TransactionPartner;
    use TgBotLib\Objects\User;

    class TransactionPartnerUser extends TransactionPartner implements ObjectTypeInterface
    {
        private User $user;
        private ?string $invoice_payload;
        /**
         * @var PaidMedia[]|null
         */
        private ?array $paid_media;
        private ?string $paid_media_payload;

        /**
         * Information about the user
         *
         * @return User
         */
        public function getUser(): User
        {
            return $this->user;
        }

        /**
         * Optional. Bot-specified invoice payload
         *
         * @return string|null
         */
        public function getInvoicePayload(): ?string
        {
            return $this->invoice_payload;
        }

        /**
         * Optional. Information about the paid media bought by the user
         *
         * @return PaidMedia[]|null
         */
        public function getPaidMedia(): ?array
        {
            return $this->paid_media;
        }

        /**
         * Optional. Bot-specified paid media payload
         *
         * @return string|null
         */
        public function getPaidMediaPayload(): ?string
        {
            return $this->paid_media_payload;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
                'user' => $this->user->toArray(),
                'invoice_payload' => $this->invoice_payload,
                'paid_media' => is_null($this->paid_media) ? null : array_map(fn(PaidMedia $item) => $item->toArray(), $this->paid_media),
                'paid_media_payload' => $this->paid_media_payload,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?TransactionPartnerUser
        {
            if (is_null($data))
            {
                return null;
            }

            $object = new self();
            $object->type = TransactionPartnerType::USER;
            $object->user = User::fromArray($data['user']);
            $object->invoice_payload = $data['invoice_payload'] ?? null;
            $object->paid_media = is_null($data['paid_media']) ? null : array_map(fn($item) => PaidMedia::fromArray($item), $data['paid_media']);
            $object->paid_media_payload = $data['paid_media_payload'] ?? null;

            return $object;
        }
    }