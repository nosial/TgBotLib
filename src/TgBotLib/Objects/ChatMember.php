<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\ChatMemberStatus;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ChatMember\ChatMemberAdministrator;
    use TgBotLib\Objects\ChatMember\ChatMemberBanned;
    use TgBotLib\Objects\ChatMember\ChatMemberLeft;
    use TgBotLib\Objects\ChatMember\ChatMemberMember;
    use TgBotLib\Objects\ChatMember\ChatMemberOwner;
    use TgBotLib\Objects\ChatMember\ChatMemberRestricted;

    abstract class ChatMember implements ObjectTypeInterface
    {
        /**
         * @var ChatMemberStatus
         */
        protected ChatMemberStatus $status;

        /**
         * The member's status in the chat, can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
         *
         * @return ChatMemberStatus
         */
        public function getStatus(): ChatMemberStatus
        {
            return $this->status;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ChatMember
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['status']))
            {
                throw new InvalidArgumentException('ChatMember expected status');
            }

            return match(ChatMemberStatus::tryFrom($data['status']))
            {
                ChatMemberStatus::ADMINISTRATOR => ChatMemberAdministrator::fromArray($data),
                ChatMemberStatus::KICKED => ChatMemberBanned::fromArray($data),
                ChatMemberStatus::LEFT => ChatMemberLeft::fromArray($data),
                ChatMemberStatus::MEMBER => ChatMemberMember::fromArray($data),
                ChatMemberStatus::CREATOR => ChatMemberOwner::fromArray($data),
                ChatMemberStatus::RESTRICTED => ChatMemberRestricted::fromArray($data),
                default => throw new InvalidArgumentException('Unexpected status for ChatMember')
            };
        }
    }