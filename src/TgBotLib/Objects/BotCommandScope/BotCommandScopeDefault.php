<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Abstracts\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeDefault implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * Scope type, must be default
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
                'type' => $this->type
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

            $object->type = $data['type'] ?? BotCommandScopeType::Default;

            return $object;
        }

        /**
         * Constructs object from BotCommandScope
         *
         * @param BotCommandScope $botCommandScope
         * @return BotCommandScopeDefault
         */
        public static function fromBotCommandScope(BotCommandScope $botCommandScope): BotCommandScopeDefault
        {
            $object = new self();

            $object->type = $botCommandScope->getType();

            return $object;
        }
    }