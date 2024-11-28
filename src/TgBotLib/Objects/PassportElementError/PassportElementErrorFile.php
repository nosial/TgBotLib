<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorFile extends PassportElementError
    {
        private PassportElementErrorType $type;
        private string $fileHash;
        private string $message;

        /**
         * Represents an issue with a document scan.
         * The error is considered resolved when the file with the document scan changes.
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
         * The section of the user's Telegram Passport which has the issue,
         * one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * The section of the user's Telegram Passport which has the issue,
         * one of “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration”, “temporary_registration”
         *
         * @param PassportElementErrorType $type
         * @return $this
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorFile
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
        public function setFileHash(string $fileHash): PassportElementErrorFile
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
        public function setMessage(string $message): PassportElementErrorFile
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
                'message' => $this->message
            ];
        }
    }