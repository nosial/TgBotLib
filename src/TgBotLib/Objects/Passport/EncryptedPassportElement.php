<?php


    namespace TgBotLib\Objects\Passport;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class EncryptedPassportElement implements ObjectTypeInterface
    {
        private string $type;
        private ?string $data;
        private ?string $phone_number;
        private ?string $email;
        /**
         * @var PassportFile[]|null
         */
        private ?array $files;
        /**
         * @var PassportFile[]|null
         */
        private ?array $front_side;
        /**
         * @var PassportFile[]|null
         */
        private ?array $reverse_side;
        /**
         * @var PassportFile[]|null
         */
        private ?array $selfie;
        /**
         * @var PassportFile[]|null
         */
        private ?array $translation;
        private string $hash;

        /**
         * Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”,
         * “address”, “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”,
         * “temporary_registration”, “phone_number”, “email”.
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for
         * “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” types.
         * Can be decrypted and verified using the accompanying EncryptedCredentials.
         *
         * @see https://core.telegram.org/bots/api#encryptedcredentials
         * @return string|null
         */
        public function getData(): ?string
        {
            return $this->data;
        }

        /**
         * Optional. User's verified phone number, available only for “phone_number” type
         *
         * @return string|null
         */
        public function getPhoneNumber(): ?string
        {
            return $this->phone_number;
        }

        /**
         * Optional. User's verified email address, available only for “email” type
         *
         * @return string|null
         */
        public function getEmail(): ?string
        {
            return $this->email;
        }

        /**
         * Optional. Array of encrypted files with documents provided by the user, available for “utility_bill”,
         * “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can
         * be decrypted and verified using the accompanying EncryptedCredentials.
         *
         * @see https://core.telegram.org/bots/api#encryptedcredentials
         * @return PassportFile[]|null
         */
        public function getFiles(): ?array
        {
            return $this->files;
        }

        /**
         * Optional. Encrypted file with the front side of the document, provided by the user. Available for “passport”,
         * “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified using the
         * accompanying EncryptedCredentials.
         *
         * @see https://core.telegram.org/bots/api#encryptedcredentials
         * @return PassportFile[]|null
         */
        public function getFrontSide(): ?array
        {
            return $this->front_side;
        }

        /**
         * Optional. Encrypted file with the reverse side of the document, provided by the user. Available for
         * “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying
         * EncryptedCredentials.
         *
         * @see https://core.telegram.org/bots/api#encryptedcredentials
         * @return PassportFile[]|null
         */
        public function getReverseSide(): ?array
        {
            return $this->reverse_side;
        }

        /**
         * Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available for
         * “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and verified
         * using the accompanying EncryptedCredentials.
         *
         * @see https://core.telegram.org/bots/api#encryptedcredentials
         * @return PassportFile[]|null
         */
        public function getSelfie(): ?array
        {
            return $this->selfie;
        }

        /**
         * Optional. Array of encrypted files with translated versions of documents provided by the user. Available if
         * requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”,
         * “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can
         * be decrypted and verified using the accompanying EncryptedCredentials.
         *
         * @see https://core.telegram.org/bots/api#encryptedcredentials
         * @return PassportFile[]|null
         */
        public function getTranslation(): ?array
        {
            return $this->translation;
        }

        /**
         * Base64-encoded element hash for using in PassportElementErrorUnspecified
         *
         * @see https://core.telegram.org/bots/api#passportelementerrorunspecified
         * @return string
         */
        public function getHash(): string
        {
            return $this->hash;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'data' => $this->data,
                'phone_number' => $this->phone_number,
                'email' => $this->email,
                'files' => is_null($this->files) ? null : array_map(fn(PassportFile $item) => $item->toArray(), $this->files),
                'front_side' => is_null($this->front_side) ? null : array_map(fn(PassportFile $item) => $item->toArray(), $this->front_side),
                'reverse_side' => is_null($this->reverse_side) ? null : array_map(fn(PassportFile $item) => $item->toArray(), $this->reverse_side),
                'selfie' => is_null($this->selfie) ? null : array_map(fn(PassportFile $item) => $item->toArray(), $this->selfie),
                'translation' => is_null($this->translation) ? null : array_map(fn(PassportFile $item) => $item->toArray(), $this->translation),
                'hash' => $this->hash
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?EncryptedPassportElement
        {
            if($data === null)
            {
                return null;
            }

            $object = new static();
            $object->type = $data['type'];
            $object->data = $data['data'] ?? null;
            $object->phone_number = $data['phone_number'] ?? null;
            $object->email = $data['email'] ?? null;
            $object->files = isset($data['files']) ? array_map(fn(array $items) => PassportFile::fromArray($items), $data['files']) : null;
            $object->front_side = isset($data['front_side']) ? array_map(fn(array $items) => PassportFile::fromArray($items), $data['front_side']) : null;
            $object->reverse_side = isset($data['reverse_side']) ? array_map(fn(array $items) => PassportFile::fromArray($items), $data['reverse_side']) : null;
            $object->selfie = isset($data['selfie']) ? array_map(fn(array $items) => PassportFile::fromArray($items), $data['selfie']) : null;
            $object->translation = isset($data['translation']) ? array_map(fn(array $items) => PassportFile::fromArray($items), $data['translation']) : null;
            $object->hash = $data['hash'];

            return $object;
        }
}