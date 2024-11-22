<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PreparedInlineMessage implements ObjectTypeInterface
    {
        private ?string $id;
        private ?int $expirationDate;

        /**
         * Describes an inline message to be sent by a user of a Mini App.
         *
         * @param array $data
         */
        public function __construct(?array $data)
        {
            if($data === null)
            {
                $this->id = null;
                $this->expirationDate = null;

                return;
            }

            $this->id = $data['id'];
            $this->expirationDate = (int)$data['expiration_date'];
        }

        /**
         * Unique identifier of the prepared message
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * Sets the ID for the prepared inline message.
         *
         * @param string $id The ID to set.
         * @return PreparedInlineMessage The current instance.
         */
        public function setId(string $id): PreparedInlineMessage
        {
            $this->id = $id;
            return $this;
        }

        /**
         * Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be used
         *
         * @return int
         */
        public function getExpirationDate(): int
        {
            return $this->expirationDate;
        }

        /**
         * Sets the expiration date for the prepared inline message.
         *
         * @param int $expirationDate The expiration date timestamp.
         * @return PreparedInlineMessage Returns the
         */
        public function setExpirationDate(int $expirationDate): PreparedInlineMessage
        {
            $this->expirationDate = $expirationDate;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'id' => $this->id,
                'expiration_date' => $this->expirationDate
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): PreparedInlineMessage
        {
            return new self($data);
        }
    }