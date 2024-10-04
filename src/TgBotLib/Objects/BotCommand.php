<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotCommand implements ObjectTypeInterface
    {
        private string $command;
        private string $description;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'command' => $this->command,
                'description' => $this->description,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BotCommand
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->command = $data['command'] ?? null;
            $object->description = $data['description'] ?? null;

            return $object;
        }
    }