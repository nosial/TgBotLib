<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Abstracts\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeAllGroupChats implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * Scope type, must be all_group_chats
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
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->type = $data['type'] ?? BotCommandScopeType::AllGroupChats;

            return $object;
        }

        /**
         * Constructs object from BotCommandScope
         *
         * @param BotCommandScope $botCommandScope
         * @return BotCommandScopeAllGroupChats
         */
        public static function fromBotCommandScope(BotCommandScope $botCommandScope): BotCommandScopeAllGroupChats
        {
            $object = new self();

            $object->type = $botCommandScope->getType();

            return $object;
        }
    }