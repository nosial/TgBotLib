<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotShortDescription implements ObjectTypeInterface
    {
        private string $short_description;

        /**
         * The bot's short description
         *
         * @return string
         */
        public function getShortDescription(): string
        {
            return $this->short_description;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'short_description' => $this->short_description,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): BotShortDescription
        {
            $object = new self();

            $object->short_description = $data['short_description'];

            return $object;
        }
    }