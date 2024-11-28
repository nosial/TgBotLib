<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorFrontSide extends PassportElementError
    {
        private PassportElementErrorType $type;
        private string $fileHash;
        private string $message;

        /**
         * Represents an issue with the front side of a document.
         * The error is considered resolved when the file with the front side of the document changes.
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
         * one of “passport”, “driver_license”, “identity_card”, “internal_passport”
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * The section of the user's Telegram Passport which has the issue,
         * one of “passport”, “driver_license”, “identity_card”, “internal_passport”
         *
         * @param PassportElementErrorType $type
         * @return PassportElementErrorFrontSide
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorFrontSide
        {
            $this->type = $type;
            return $this;
        }

        /**
         * Base64-encoded hash of the file with the front side of the document
         *
         * @return string
         */
        public function getFileHash(): string
        {
            return $this->fileHash;
        }

        /**
         * Base64-encoded hash of the file with the front side of the document
         *
         * @param string $fileHash
         * @return $this
         */
        public function setFileHash(string $fileHash): PassportElementErrorFrontSide
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
         * @return PassportElementErrorFrontSide
         */
        public function setMessage(string $message): PassportElementErrorFrontSide
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