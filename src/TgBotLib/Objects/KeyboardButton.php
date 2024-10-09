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
         * KeyboardButton constructor.
         */
        public function __construct()
        {
            $this->text = (string) null;
            $this->request_user = null;
            $this->request_chat = null;
            $this->request_contact = false;
            $this->request_location = false;
            $this->request_poll = null;
            $this->web_app = null;
        }

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
         * Set the text of the button
         *
         * @param string $text
         * @return KeyboardButton
         */
        public function setText(string $text): KeyboardButton
        {
            $this->text = $text;
            return $this;
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
         * Set the request user
         *
         * @param KeyboardButtonRequestUser $request_user
         * @return KeyboardButton
         */
        public function setRequestUser(KeyboardButtonRequestUser $request_user): KeyboardButton
        {
            $this->request_user = $request_user;
            return $this;
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
         * Set the request chat
         *
         * @param KeyboardButtonRequestChat $request_chat
         * @return KeyboardButton
         */
        public function setRequestChat(KeyboardButtonRequestChat $request_chat): KeyboardButton
        {
            $this->request_chat = $request_chat;
            return $this;
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
         * Set the request contact
         *
         * @param bool $request_contact
         * @return KeyboardButton
         */
        public function setRequestContact(bool $request_contact): KeyboardButton
        {
            $this->request_contact = $request_contact;
            return $this;
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
         * Set the request location
         *
         * @param bool $request_location
         * @return KeyboardButton
         */
        public function setRequestLocation(bool $request_location): KeyboardButton
        {
            $this->request_location = $request_location;
            return $this;
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
         * Set the request poll
         *
         * @param KeyboardButtonPollType $request_poll
         * @return KeyboardButton
         */
        public function setRequestPoll(KeyboardButtonPollType $request_poll): KeyboardButton
        {
            $this->request_poll = $request_poll;
            return $this;
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
         * Set the web app
         *
         * @param WebAppInfo $web_app
         * @return KeyboardButton
         */
        public function setWebApp(WebAppInfo $web_app): KeyboardButton
        {
            $this->web_app = $web_app;
            return $this;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            $array = [
                'text' => $this->text,
            ];

            if($this->request_user !== null)
            {
                $array['request_user'] = $this->request_user->toArray();
            }

            if($this->request_chat !== null)
            {
                $array['request_chat'] = $this->request_chat->toArray();
            }

            if($this->request_contact !== false)
            {
                $array['request_contact'] = $this->request_contact;
            }

            if($this->request_location !== false)
            {
                $array['request_location'] = $this->request_location;
            }

            if($this->request_poll !== null)
            {
                $array['request_poll'] = $this->request_poll->toArray();
            }

            if($this->web_app !== null)
            {
                $array['web_app'] = $this->web_app->toArray();
            }

            return $array;
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
            $object->request_contact = $data['request_contact'] ?? false;
            $object->request_location = $data['request_location'] ?? false;
            $object->request_poll = isset($data['request_poll']) ? KeyboardButtonPollType::fromArray($data['request_poll']) : null;
            $object->web_app = isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null;

            return $object;
        }
    }