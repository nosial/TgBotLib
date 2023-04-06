<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotShortDescription implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $short_description;

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
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'short_description' => $this->short_description,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return BotShortDescription
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->short_description = $data['short_description'];

            return $object;
        }
    }