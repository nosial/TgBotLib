<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeAllChatAdministrators;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeAllGroupChats;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeAllPrivateChats;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeChat;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeChatAdministrators;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeChatMember;
    use TgBotLib\Objects\BotCommandScope\BotCommandScopeDefault;

    abstract class BotCommandScope implements ObjectTypeInterface
    {
        protected BotCommandScopeType $type;

        /**
         * Scope type, one of “default”, “all_private_chats”, “all_group_chats”, “all_chat_administrators”, “chat”,
         * “chat_administrators”, “chat_member”
         *
         * @return BotCommandScopeType
         */
        public function getType(): BotCommandScopeType
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
        public static function fromArray(?array $data): ?BotCommandScope
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('BotCommandScope expected type');
            }

            return match(BotCommandScopeType::tryFrom($data['type']))
            {
                BotCommandScopeType::DEFAULT => BotCommandScopeDefault::fromArray($data),
                BotCommandScopeType::ALL_PRIVATE_CHATS => BotCommandScopeAllPrivateChats::fromArray($data),
                BotCommandScopeType::ALL_CHAT_GROUPS => BotCommandScopeAllGroupChats::fromArray($data),
                BotCommandScopeType::ALL_CHAT_ADMINISTRATORS => BotCommandScopeChatAdministrators::fromArray($data),
                BotCommandScopeType::CHAT => BotCommandScopeChat::fromArray($data),
                BotCommandScopeType::CHAT_ADMINISTRATORS => BotCommandScopeAllChatAdministrators::fromArray($data),
                BotCommandScopeType::CHAT_MEMBER => BotCommandScopeChatMember::fromArray($data),
                default => throw new InvalidArgumentException('Unexpected match value')
            };
        }
    }