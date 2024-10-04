<?php


    namespace TgBotLib\Objects\MenuButton;

    use TgBotLib\Enums\Types\MenuButtonType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MenuButton;

    class MenuButtonDefault extends MenuButton implements ObjectTypeInterface
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
        public static function fromArray(?array $data): ?MenuButtonDefault
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = MenuButtonType::DEFAULT;
            return $object;
        }
    }