<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Enums\Types\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeAllChatAdministrators extends BotCommandScope implements ObjectTypeInterface
    {
        /**
         * @var int|string
         */
        private $chat_id;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'chat_id' => $this->chat_id
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BotCommandScopeAllChatAdministrators
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = BotCommandScopeType::ALL_CHAT_ADMINISTRATORS;
            $object->chat_id = $data['chat_id'] ?? null;

            return $object;
        }
    }