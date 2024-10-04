<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Dice implements ObjectTypeInterface
    {
        private string $emoji;
        private int $value;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'emoji' => $this->emoji,
                'value' => $this->value,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Dice
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->emoji = $data['emoji'] ?? null;
            $object->value = $data['value'] ?? null;

            return $object;
        }
    }