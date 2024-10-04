<?php


    namespace TgBotLib\Objects\Passport;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class EncryptedCredentials implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $data;

        /**
         * @var string
         */
        private $hash;

        /**
         * @var string
         */
        private $secret;

        /**
         * Base64-encoded encrypted JSON-serialized data with unique user's payload, data hashes and secrets required
         * for EncryptedPassportElement decryption and authentication
         *
         * @see https://core.telegram.org/bots/api#encryptedpassportelement
         * @return string
         */
        public function getData(): string
        {
            return $this->data;
        }

        /**
         * Base64-encoded data hash for data authentication
         *
         * @return string
         */
        public function getHash(): string
        {
            return $this->hash;
        }

        /**
         * Base64-encoded secret, encrypted with the bot's public RSA key, required for data decryption
         *
         * @return string
         */
        public function getSecret(): string
        {
            return $this->secret;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'data' => $this->data,
                'hash' => $this->hash,
                'secret' => $this->secret,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return EncryptedCredentials
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->data = $data['data'] ?? null;
            $object->hash = $data['hash'] ?? null;
            $object->secret = $data['secret'] ?? null;

            return $object;
        }
    }