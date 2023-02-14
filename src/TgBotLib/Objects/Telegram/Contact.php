<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Contact implements ObjectTypeInterface
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
         * @var int|null
         */
        private $user_id;

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
         * Contact's first name
         *
         * @return string
         */
        public function getFirstName(): string
        {
            return $this->first_name;
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
         * Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some
         * programming languages may have difficulty/silent defects in interpreting it. But it has at most 52
         * significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
         *
         * @return int|null
         */
        public function getUserId(): ?int
        {
            return $this->user_id;
        }

        /**
         * Optional. Additional data about the contact in the form of a vCard
         *
         * @return string|null
         */
        public function getVcard(): ?string
        {
            return $this->vcard;
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
                'last_name'=> $this->last_name,
                'user_id' => $this->user_id,
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
            $object->user_id = $data['user_id'] ?? null;
            $object->vcard = $data['vcard'] ?? null;

            return $object;
        }
    }