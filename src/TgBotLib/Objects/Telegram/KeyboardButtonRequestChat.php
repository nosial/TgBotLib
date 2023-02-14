<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class KeyboardButtonRequestChat implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $request_id;

        /**
         * @var bool
         */
        private $chat_is_channel;

        /**
         * @var bool
         */
        private $chat_is_forum;

        /**
         * @var bool
         */
        private $chat_has_username;

        /**
         * @var bool
         */
        private $chat_is_created;

        /**
         * @var ChatAdministratorRights|null
         */
        private $user_administrator_rights;

        /**
         * @var ChatAdministratorRights|null
         */
        private $bot_administrator_rights;

        /**
         * @var bool
         */
        private $bot_is_member;

        /**
         * Signed 32-bit identifier of the request, which will be received back in the ChatShared object.
         * Must be unique within the message
         *
         * @see https://core.telegram.org/bots/api#chatshared
         * @return int
         */
        public function getRequestId(): int
        {
            return $this->request_id;
        }

        /**
         * Pass True to request a channel chat, pass False to request a group or a supergroup chat.
         *
         * @return bool
         */
        public function chatIsChannel(): bool
        {
            return $this->chat_is_channel;
        }

        /**
         * Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat.
         * If not specified, no additional restrictions are applied.
         *
         * @return bool
         */
        public function chatIsForum(): bool
        {
            return $this->chat_is_forum;
        }

        /**
         * Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat
         * without a username. If not specified, no additional restrictions are applied.
         *
         * @return bool
         */
        public function chatHasUsername(): bool
        {
            return $this->chat_has_username;
        }

        /**
         * Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
         *
         * @return bool
         */
        public function chatIsCreated(): bool
        {
            return $this->chat_is_created;
        }

        /**
         * Optional. A JSON-serialized object listing the required administrator rights of the user in the chat.
         * The rights must be a superset of bot_administrator_rights. If not specified, no additional
         * restrictions are applied.
         *
         * @return ChatAdministratorRights|null
         */
        public function getUserAdministratorRights(): ?ChatAdministratorRights
        {
            return $this->user_administrator_rights;
        }

        /**
         * Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat.
         * The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions
         * are applied.
         *
         * @return ChatAdministratorRights|null
         */
        public function getBotAdministratorRights(): ?ChatAdministratorRights
        {
            return $this->bot_administrator_rights;
        }

        /**
         * Optional. Pass True to request a chat with the bot as a member.
         * Otherwise, no additional restrictions are applied.
         *
         * @return bool
         */
        public function botIsMember(): bool
        {
            return $this->bot_is_member;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'request_id' => $this->request_id,
                'chat_is_channel' => $this->chat_is_channel,
                'chat_is_forum' => $this->chat_is_forum,
                'chat_has_username' => $this->chat_has_username,
                'chat_is_created' => $this->chat_is_created,
                'user_administrator_rights' => ($this->user_administrator_rights instanceof ObjectTypeInterface) ? $this->user_administrator_rights->toArray() : null,
                'bot_administrator_rights' => ($this->bot_administrator_rights instanceof ObjectTypeInterface) ? $this->bot_administrator_rights->toArray() : null,
                'bot_is_member' => $this->bot_is_member,
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

            $object->request_id = $data['request_id'] ?? null;
            $object->chat_is_channel = $data['chat_is_channel'] ?? false;
            $object->chat_is_forum = $data['chat_is_forum'] ?? false;
            $object->chat_has_username = $data['chat_has_username'] ?? false;
            $object->chat_is_created = $data['chat_is_created'] ?? false;
            $object->user_administrator_rights = ($data['user_administrator_rights'] !== null) ? ChatAdministratorRights::fromArray($data['user_administrator_rights']) : null;
            $object->bot_administrator_rights = ($data['bot_administrator_rights'] !== null) ? ChatAdministratorRights::fromArray($data['bot_administrator_rights']) : null;
            $object->bot_is_member = $data['bot_is_member'] ?? false;

            return $object;
        }
    }