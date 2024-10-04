<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\MenuButton;

    use TgBotLib\Enums\Types\MenuButtonType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MenuButton;

    class MenuButtonCommands extends MenuButton implements ObjectTypeInterface
    {
        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MenuButtonCommands
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = MenuButtonType::COMMANDS;
            return $object;
        }
    }