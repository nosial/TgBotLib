<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorFiles extends PassportElementError
    {
        private PassportElementErrorType $type;
        /**
         * @var string[]
         */
        private array $fileHashes;
        private string $message;

        /**
         * Represents an issue with a list of scans.
         * The error is considered resolved when the list of files containing the scans changes.
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
            $this->fileHashes = $data['file_hashes'];
            $this->message = $data['message'];
        }

        /**
         * List of base64-encoded file hashes
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * List of base64-encoded file hashes
         *
         * @param PassportElementErrorType $type
         * @return $this
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorFiles
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
        public function setFileHashes(array $fileHashes): PassportElementErrorFiles
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
        public function setMessage(string $message): PassportElementErrorFiles
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