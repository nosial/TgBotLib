<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\MenuButton;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MenuButton;

    class MenuButtonCommands implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * Type of the button, must be commands
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Returns an array representation of the object
         *
         * @return string[]
         */
        public function toArray(): array
        {
            return [
                'type' => $this->getType(),
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

            $object->type = $data['type'] ?? null;

            return $object;
        }

        /**
         * Constructs object from MenuButton
         *
         * @param MenuButton $menuButton
         * @return MenuButtonCommands
         */
        public static function fromMenuButton(MenuButton $menuButton): MenuButtonCommands
        {
            $object = new self();

            $object->type = $menuButton->getType();

            return $object;
        }
    }