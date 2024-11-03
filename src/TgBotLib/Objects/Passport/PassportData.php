<?php


    namespace TgBotLib\Objects\Passport;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PassportData implements ObjectTypeInterface
    {
        /**
         * @var EncryptedPassportElement[]
         */
        private array $data;
        private EncryptedCredentials $credentials;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'data' => array_map(fn(EncryptedPassportElement $item) => $item->toArray(), $this->data),
                'credentials' => $this->credentials->toArray(),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?PassportData
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->data = isset($data['data']) ? array_map(fn(array $items) => EncryptedPassportElement::fromArray($items), $data['data']) : null;
            $object->credentials = isset($data['credentials']) ? EncryptedCredentials::fromArray($data['credentials']) : null;

            return $object;
        }
    }