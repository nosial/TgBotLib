<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorTranslationFiles extends PassportElementError
    {
        private PassportElementErrorType $type;
        /**
         * @var string[]
         */
        private array $fileHashes;
        private string $message;

        /**
         * Represents an issue with the translated version of a document.
         * The error is considered resolved when a file with the document translation change.
         *
         * @param array|null $data
         */
        public function __construct(?array $data = null)
        {
            parent::__construct($data);
        }

        /**
         * Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”,
         * “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”,
         * “passport_registration”, “temporary_registration”
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * Type of element of the user's Telegram Passport which has the issue, one of “passport”, “driver_license”,
         * “identity_card”, “internal_passport”, “utility_bill”, “bank_statement”, “rental_agreement”,
         * “passport_registration”, “temporary_registration”
         *
         * @param PassportElementErrorType $type
         * @return $this
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorTranslationFiles
        {
            $this->type = $type;
            return $this;
        }

        /**
         * List of base64-encoded file hashes
         *
         * @return string[]
         */
        public function getFileHashes(): array
        {
            return $this->fileHashes;
        }

        /**
         * List of base64-encoded file hashes
         *
         * @param array $fileHashes
         * @return $this
         */
        public function setFileHashes(array $fileHashes): PassportElementErrorTranslationFiles
        {
            $this->fileHashes = $fileHashes;
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
        public function setMessage(string $message): PassportElementErrorTranslationFiles
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
                'file_hashes' => $this->fileHashes,
                'message' => $this->message
            ];
        }
    }