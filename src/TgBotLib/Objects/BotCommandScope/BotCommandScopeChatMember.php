<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Enums\Types\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeChatMember extends BotCommandScope implements ObjectTypeInterface
    {
        private string|int $chat_id;
        private int $user_id;

        /**
         * Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         *
         * @return string|int
         */
        public function getChatId(): string|int
        {
            return $this->chat_id;
        }

        /**
         * Unique identifier of the target user
         *
         * @return int
         */
        public function getUserId(): int
        {
            return $this->user_id;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'chat_id' => $this->chat_id,
                'user_id' => $this->user_id
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): self
        {
            $object = new self();
            $object->type = BotCommandScopeType::CHAT_MEMBER;
            $object->chat_id = $data['chat_id'] ?? null;
            $object->user_id = $data['user_id'] ?? null;

            return $object;
        }
    }