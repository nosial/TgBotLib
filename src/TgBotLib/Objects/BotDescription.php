<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotDescription implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $description;

        /**
         * The bot's short description
         *
         * @return string
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * Returns an array representation of the object
         *
         * @return string[]
         */
        public function toArray(): array
        {
            return [
                'description' => $this->description,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return BotDescription
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->description = $data['description'];

            return $object;
        }

    }