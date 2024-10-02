<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Enums\Types\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeChatAdministrators implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * Scope type, must be chat_administrators
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
         * @return array
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
         * @return BotCommandScopeChatAdministrators
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->type = $data['type'] ?? BotCommandScopeType::CHAT_ADMINISTRATORS;

            return $object;
        }

        /**
         * Constructs object from BotCommandScope
         *
         * @param BotCommandScope $botCommandScope
         * @return BotCommandScopeChatAdministrators
         */
        public static function fromBotCommandScope(BotCommandScope $botCommandScope): BotCommandScopeChatAdministrators
        {
            $object = new self();

            $object->type = $botCommandScope->getType();

            return $object;
        }
    }