<?php

    namespace TgBotLib\Objects\PassportElementError;

    use TgBotLib\Enums\Types\PassportElementErrorType;
    use TgBotLib\Objects\PassportElementError;

    class PassportElementErrorDataField extends PassportElementError
    {
        private PassportElementErrorType $type;
        private string $fieldName;
        private string $dataHash;
        private string $message;

        /**
         * Represents an issue in one of the data fields that was provided by the user.
         * The error is considered resolved when the field's value changes.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            parent::__construct($data);

            if($data == null)
            {
                return;
            }

            $this->type = PassportElementErrorType::tryFrom($data['type'] ?? null);
            $this->fieldName = $data['field_name'];
            $this->dataHash = $data['data_hash'];
            $this->message = $data['message'];
        }

        /**
         * The section of the user's Telegram Passport which has the error,
         * one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
         *
         * @return PassportElementErrorType
         */
        public function getType(): PassportElementErrorType
        {
            return $this->type;
        }

        /**
         * The section of the user's Telegram Passport which has the error,
         * one of “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport”, “address”
         *
         * @param PassportElementErrorType $type
         * @return PassportElementErrorDataField
         */
        public function setType(PassportElementErrorType $type): PassportElementErrorDataField
        {
            $this->type = $type;
            return $this;
        }

        /**
         * Name of the data field which has the error
         *
         * @return string
         */
        public function getFieldName(): string
        {
            return $this->fieldName;
        }

        /**
         * Name of the data field which has the error
         *
         * @param string $fieldName
         * @return PassportElementErrorDataField
         */
        public function setFieldName(string $fieldName): PassportElementErrorDataField
        {
            $this->fieldName = $fieldName;
            return $this;
        }

        /**
         * Base64-encoded data hash
         *
         * @return string
         */
        public function getDataHash(): string
        {
            return $this->dataHash;
        }

        /**
         * Base64-encoded data hash
         *
         * @param string $dataHash
         * @return PassportElementErrorDataField
         */
        public function setDataHash(string $dataHash): PassportElementErrorDataField
        {
            $this->dataHash = $dataHash;
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
         * @return PassportElementErrorDataField
         */
        public function setMessage(string $message): PassportElementErrorDataField
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
                'field_name' => $this->fieldName,
                'data_hash' => $this->dataHash,
                'message' => $this->message
            ];
        }
    }