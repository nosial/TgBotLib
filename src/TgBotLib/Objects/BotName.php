<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotName implements ObjectTypeInterface
    {
        private string $name;

        /**
         * The bot's name
         *
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'name' => $this->name
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BotName
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->name = $data['name'];

            return $object;
        }
    }