<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\InputMessageContent;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InputContactMessageContent implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $phone_number;

        /**
         * @var string
         */
        private $first_name;

        /**
         * @var string|null
         */
        private $last_name;

        /**
         * @var string|null
         */
        private $vcard;

        /**
         * Contact's phone number
         *
         * @return string
         */
        public function getPhoneNumber(): string
        {
            return $this->phone_number;
        }

        /**
         * Sets the value of 'phone_number' property
         * Contact's phone number
         *
         * @param string $phone_number
         * @return $this
         */
        public function setPhoneNumber(string $phone_number): self
        {
            if(!Validate::length($phone_number, 1, 255))
                throw new InvalidArgumentException('phone_number should be between 1-255 characters');

            $this->phone_number = $phone_number;
            return $this;
        }

        /**
         * Contact's first name
         *
         * @return string
         */
        public function getFirstName(): string
        {
            return $this->first_name;
        }

        /**
         * Sets the value of 'first_name' property
         * Contact's first name
         *
         * @param string $first_name
         * @return $this
         */
        public function setFirstName(string $first_name): self
        {
            if(!Validate::length($first_name, 1, 255))
                throw new InvalidArgumentException('first_name should be between 1-255 characters');

            $this->first_name = $first_name;
            return $this;
        }

        /**
         * Optional. Contact's last name
         *
         * @return string|null
         */
        public function getLastName(): ?string
        {
            return $this->last_name;
        }

        /**
         * Sets the value of 'last_name' property
         * Optional. Contact's last name
         *
         * @param string|null $last_name
         * @return InputContactMessageContent
         */
        public function setLastName(?string $last_name): self
        {
            if($last_name == null)
            {
                $this->last_name = null;
                return $this;
            }

            if(!Validate::length($last_name, 1, 255))
                throw new InvalidArgumentException('last_name should be between 1-255 characters (or null)');

            $this->last_name = $last_name;
            return $this;
        }

        /**
         * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
         *
         * @see https://en.wikipedia.org/wiki/VCard
         * @return string|null
         */
        public function getVcard(): ?string
        {
            return $this->vcard;
        }

        /**
         * Sets the value of 'vcard' property
         * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes
         *
         * @param string|null $vcard
         * @return InputContactMessageContent
         */
        public function setVcard(?string $vcard): self
        {
            if($vcard == null)
            {
                $this->vcard = null;
                return $this;
            }

            if(!Validate::length($vcard, 1, 2048))
                throw new InvalidArgumentException('vcard should be between 1-2048 characters (or null)');

            $this->vcard = $vcard;
            return $this;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'phone_number' => $this->phone_number,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'vcard' => $this->vcard,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->phone_number = $data['phone_number'] ?? null;
            $object->first_name = $data['first_name'] ?? null;
            $object->last_name = $data['last_name'] ?? null;
            $object->vcard = $data['vcard'] ?? null;

            return $object;
        }
    }