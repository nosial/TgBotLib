<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BotCommandScope implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var string|int|null
         */
        private $chat_id;

        /**
         * @var int|null
         */
        private $user_id;

        /**
         * Scope type, one of “default”, “all_private_chats”, “all_group_chats”, “all_chat_administrators”, “chat”,
         * “chat_administrators”, “chat_member”
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
         * @return int|string|null
         */
        public function getChatId(): int|string|null
        {
            return $this->chat_id;
        }

        /**
         * Unique identifier of the target user
         *
         * @return int|null
         */
        public function getUserId(): ?int
        {
            return $this->user_id;
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
                'chat_id' => $this->chat_id,
                'user_id' => $this->user_id,
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

            $object->type = $data['type'];
            $object->chat_id = $data['chat_id'] ?? null;
            $object->user_id = $data['user_id'] ?? null;

            return $object;
        }
    }