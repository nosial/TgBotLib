<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\MenuButtonType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MenuButton\MenuButtonCommands;
    use TgBotLib\Objects\MenuButton\MenuButtonDefault;
    use TgBotLib\Objects\MenuButton\MenuButtonWebApp;

    abstract class MenuButton implements ObjectTypeInterface
    {
        protected MenuButtonType $type;

        /**
         * Type of the button, must be web_app
         *
         * @return MenuButtonType
         */
        public function getType(): MenuButtonType
        {
            return $this->type;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MenuButton
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('MenuButton expected property type');
            }

            return match(MenuButtonType::tryFrom($data['type']))
            {
                MenuButtonType::COMMANDS => MenuButtonCommands::fromArray($data),
                MenuButtonType::DEFAULT => MenuButtonDefault::fromArray($data),
                MenuButtonType::WEB_APP => MenuButtonWebApp::fromArray($data),
                default => throw new InvalidArgumentException('Unexpected MenuButton Type')
            };
        }
    }