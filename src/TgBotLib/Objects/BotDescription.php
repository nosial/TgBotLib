<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotDescription implements ObjectTypeInterface
    {
        private string $description;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'description' => $this->description,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): BotDescription
        {
            $object = new self();
            $object->description = $data['description'];

            return $object;
        }

    }