<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorUnspecified extends PassportElementError
    {
        private PassportElementErrorType $type;
        private string $elementHash;
        private string $message;

        /**
         * Represents an issue in an unspecified place. The error is considered resolved when new data is added.
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
            $this->elementHash = $data['element_hash'];
            $this->message = $data['message'];
        }

        /**
         * Type of element of the user's Telegram Passport which has the issue
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * Type of element of the user's Telegram Passport which has the issue
         *
         * @param PassportElementErrorType $type
         * @return $this
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorUnspecified
        {
            $this->type = $type;
            return $this;
        }

        /**
         * Base64-encoded element hash
         *
         * @return string
         */
        public function getElementHash(): string
        {
            return $this->elementHash;
        }

        /**
         * Base64-encoded element hash
         *
         * @param string $elementHash
         * @return $this
         */
        public function setElementHash(string $elementHash): PassportElementErrorUnspecified
        {
            $this->elementHash = $elementHash;
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
        public function setMessage(string $message): PassportElementErrorUnspecified
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
                'element_hash' => $this->elementHash,
                'message' => $this->message
            ];
        }
    }