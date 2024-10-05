<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class KeyboardButton implements ObjectTypeInterface
    {
        private string $text;
        private ?KeyboardButtonRequestUser $request_user;
        private ?KeyboardButtonRequestChat $request_chat;
        private bool $request_contact;
        private bool $request_location;
        private ?KeyboardButtonPollType $request_poll;
        private ?WebAppInfo $web_app;

        /**
         * Text of the button. If none of the optional fields are used, it will be sent as a message when the
         * button is pressed
         *
         * @return string
         */
        public function getText(): string
        {
            return $this->text;
        }

        /**
         * Optional. If specified, pressing the button will open a list of suitable users. Tapping on any user will
         * send their identifier to the bot in a “user_shared” service message. Available in private chats only.
         *
         * @return KeyboardButtonRequestUser|null
         */
        public function getRequestUser(): ?KeyboardButtonRequestUser
        {
            return $this->request_user;
        }

        /**
         * Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send
         * its identifier to the bot in a “chat_shared” service message. Available in private chats only.
         *
         * @return KeyboardButtonRequestChat|null
         */
        public function getRequestChat(): ?KeyboardButtonRequestChat
        {
            return $this->request_chat;
        }

        /**
         * Optional. If True, the user's phone number will be sent as a contact when the button is pressed.
         * Available in private chats only.
         *
         * @return bool
         */
        public function isRequestContact(): bool
        {
            return $this->request_contact;
        }

        /**
         * Optional. If True, the user's current location will be sent when the button is pressed.
         * Available in private chats only.
         *
         * @return bool
         */
        public function isRequestLocation(): bool
        {
            return $this->request_location;
        }

        /**
         * Optional. If specified, the user will be asked to create a poll and send it to the bot when the button
         * is pressed. Available in private chats only.
         *
         * @return KeyboardButtonPollType|null
         */
        public function getRequestPoll(): ?KeyboardButtonPollType
        {
            return $this->request_poll;
        }

        /**
         * Optional. If specified, the described Web App will be launched when the button is pressed. The
         * Web App will be able to send a “web_app_data” service message. Available in private chats only.
         *
         * @see https://core.telegram.org/bots/webapps
         * @return WebAppInfo|null
         */
        public function getWebApp(): ?WebAppInfo
        {
            return $this->web_app;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'text' => $this->text,
                'request_user' => $this->request_user?->toArray(),
                'request_chat' => $this->request_chat?->toArray(),
                'request_contact' => $this->request_contact,
                'request_location' => $this->request_location,
                'request_poll' => $this->request_poll?->toArray(),
                'web_app' => $this->web_app?->toArray(),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?KeyboardButton
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->text = $data['text'] ?? null;
            $object->request_user = isset($data['request_user']) ? KeyboardButtonRequestUser::fromArray($data['request_user']) : null;
            $object->request_chat = isset($data['request_chat']) ? KeyboardButtonRequestChat::fromArray($data['request_chat']) : null;
            $object->request_contact = $data['request_contact'] ?? null;
            $object->request_location = $data['request_location'] ?? null;
            $object->request_poll = isset($data['request_poll']) ? KeyboardButtonPollType::fromArray($data['request_poll']) : null;
            $object->web_app = isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null;

            return $object;
        }
    }