<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\BotCommandScope;

    use TgBotLib\Enums\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\BotCommandScope;

    class BotCommandScopeAllPrivateChats implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * Scope type, must be all_private_chats
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
         * @return BotCommandScopeAllPrivateChats
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->type = $data['type'] ?? BotCommandScopeType::ALL_PRIVATE_CHATS;

            return $object;
        }

        /**
         * Constructs object from BotCommandScope
         *
         * @param BotCommandScope $botCommandScope
         * @return BotCommandScopeAllPrivateChats
         */
        public static function fromBotCommandScope(BotCommandScope $botCommandScope): BotCommandScopeAllPrivateChats
        {
            $object = new self();

            $object->type = $botCommandScope->getType();

            return $object;
        }

    }