<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotCommand implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $command;

        /**
         * @var string
         */
        private $description;

        /**
         * Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
         *
         * @return string
         */
        public function getCommand(): string
        {
            return $this->command;
        }

        /**
         * Description of the command; 1-256 characters.
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
         * @return array
         */
        public function toArray(): array
        {
            return [
                'command' => $this->command,
                'description' => $this->description,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->command = $data['command'];
            $object->description = $data['description'];

            return $object;
        }
    }