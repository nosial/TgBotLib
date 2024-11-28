<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorTranslationFile extends PassportElementError
    {
        private PassportElementErrorType $type;
        private string $fileHash;
        private string $message;

        /**
         * Represents an issue with one of the files that constitute the translation of a document.
         * The error is considered resolved when the file changes.
         *
         * @param array|null $data
         */
        public function __construct(?array $data = null)
        {
            parent::__construct($data);

            if($data == null)
            {
                return;
            }

            $this->type = PassportElementErrorType::tryFrom($data['type'] ?? null);
            $this->fileHash = $data['file_hash'];
            $this->message = $data['message'];
        }

        /**
         * Type of element of the user's Telegram Passport which has the issue,
         * one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”,
         * “rental_agreement”, “passport_registration”, “temporary_registration”
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * Type of element of the user's Telegram Passport which has the issue,
         * one of “passport”, “driver_license”, “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”,
         * “rental_agreement”, “passport_registration”, “temporary_registration”
         *
         * @param PassportElementErrorType $type
         * @return $this
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorTranslationFile
        {
            $this->type = $type;
            return $this;
        }

        /**
         * Base64-encoded file hash
         *
         * @return string
         */
        public function getFileHash(): string
        {
            return $this->fileHash;
        }

        /**
         * Base64-encoded file hash
         *
         * @param string $fileHash
         * @return $this
         */
        public function setFileHash(string $fileHash): PassportElementErrorTranslationFile
        {
            $this->fileHash = $fileHash;
            return $this;
        }

        /**
         * Error message
         *
         * @return string
         */
        public function getMessage(): string
        {
            return $this->message;
        }

        /**
         * Error message
         *
         * @param string $message
         * @return $this
         */
        public function setMessage(string $message): PassportElementErrorTranslationFile
        {
            $this->message = $message;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'source' => $this->getSource()->value,
                'type' => $this->type->value,
                'file_hash' => $this->fileHash,
                'message' => $this->fileHash
            ];
        }
    }