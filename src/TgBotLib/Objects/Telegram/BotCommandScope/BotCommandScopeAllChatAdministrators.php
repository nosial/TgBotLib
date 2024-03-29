<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram\BotCommandScope;

    use TgBotLib\Enums\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\BotCommandScope;

    class BotCommandScopeAllChatAdministrators implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var int|string
         */
        private $chat_id;

        /**
         * Scope type, must be all_chat_administrators
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         *
         * @return int|string
         */
        public function getChatId(): int|string
        {
            return $this->chat_id;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'chat_id' => $this->chat_id
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return BotCommandScopeAllChatAdministrators
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->type = $data['type'] ?? BotCommandScopeType::ALL_CHAT_ADMINISTRATORS;
            $object->chat_id = $data['chat_id'] ?? null;

            return $object;
        }

        /**
         * Constructs object from BotCommandScope
         *
         * @param BotCommandScope $botCommandScope
         * @return static
         */
        public static function fromBotCommandScope(BotCommandScope $botCommandScope): self
        {
            $object = new self();

            $object->type = $botCommandScope->getType();
            $object->chat_id = $botCommandScope->getChatId();

            return $object;
        }
    }