<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PassportData implements ObjectTypeInterface
    {
        /**
         * @var EncryptedPassportElement[]
         */
        private $data;

        /**
         * @var EncryptedCredentials
         */
        private $credentials;

        /**
         * Array with information about documents and other Telegram Passport elements that was shared with the bot
         *
         * @return EncryptedPassportElement[]
         */
        public function getData(): array
        {
            return $this->data;
        }

        /**
         * Encrypted credentials required to decrypt the data
         *
         * @return EncryptedCredentials
         */
        public function getCredentials(): EncryptedCredentials
        {
            return $this->credentials;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'data' => array_map(function ($element)
                {
                    if($element instanceof ObjectTypeInterface)
                    {
                        return $element->toArray();
                    }
                    return $element;
                }, $this->data),
                'credentials' => $this->credentials->toArray(),
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
            $object->data = array_map(function (array $element)
            {
                return EncryptedPassportElement::fromArray($element);
            }, $data['data']);
            $object->credentials = EncryptedCredentials::fromArray($data['credentials']);

            return $object;
        }
    }