<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class KeyboardButtonPollType implements ObjectTypeInterface
    {
        /**
         * @var string|null
         */
        private $type;

        /**
         * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
         * If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed
         * to create a poll of any type.
         *
         * @return string|null
         */
        public function getType(): ?string
        {
            return $this->type;
        }

        /**
         * Returns an array representation of the object
         *
         * @return null[]|string[]
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
            ];
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array $data
         * @return KeyboardButtonPollType
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->type = $data['type'] ?? null;

            return $object;
        }
    }