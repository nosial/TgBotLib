<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Dice implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $emoji;

        /**
         * @var int
         */
        private $value;

        /**
         * @return string
         */
        public function getEmoji(): string
        {
            return $this->emoji;
        }

        /**
         * @return int
         */
        public function getValue(): int
        {
            return $this->value;
        }

        /**
         * Constructs object from array representation
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'emoji' => $this->emoji,
                'value' => $this->value,
            ];
        }

        /**
         * Constructs object from array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->emoji = $data['emoji'] ?? null;
            $object->value = $data['value'] ?? null;

            return $object;
        }
    }