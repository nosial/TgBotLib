<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InlineKeyboardButton implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $text;

        /**
         * @var string|null
         */
        private $url;

        /**
         * @var string|null
         */
        private $callback_data;

        /**
         * @var WebAppInfo|null
         */
        private $web_app;

        /**
         * @var LoginUrl|null
         */
        private $login_url;

        /**
         * @var string|null
         */
        private $switch_inline_query;

        /**
         * @var string|null
         */
        private $switch_inline_query_current_chat;

        /**
         * @var CallbackGame|null
         */
        private $callback_game;

        /**
         * @var bool
         */
        private $pay;

        /**
         * Label text on the button
         *
         * @return string
         */
        public function getText(): string
        {
            return $this->text;
        }

        /**
         * Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be
         * used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
         *
         * @return string|null
         */
        public function getUrl(): ?string
        {
            return $this->url;
        }

        /**
         * Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
         *
         * @see https://core.telegram.org/bots/api#callbackquery
         * @return string|null
         */
        public function getCallbackData(): ?string
        {
            return $this->callback_data;
        }

        /**
         * Optional. Description of the Web App that will be launched when the user presses the button. The Web App will
         * be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only
         * in private chats between a user and the bot.
         *
         * @return WebAppInfo|null
         */
        public function getWebApp(): ?WebAppInfo
        {
            return $this->web_app;
        }

        /**
         * Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the
         * Telegram Login Widget.
         *
         * @return LoginUrl|null
         */
        public function getLoginUrl(): ?LoginUrl
        {
            return $this->login_url;
        }

        /**
         * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and
         * insert the bot's username and the specified inline query in the input field. May be empty, in which case just
         * the bot's username will be inserted.
         *
         * Note: This offers an easy way for users to start using your bot in inline mode when they are currently in a
         * private chat with it. Especially useful when combined with switch_pm… actions - in this case the user will be
         * automatically returned to the chat they switched from, skipping the chat selection screen.
         *
         * @see https://core.telegram.org/bots/api#answerinlinequery
         * @return string|null
         */
        public function getSwitchInlineQuery(): ?string
        {
            return $this->switch_inline_query;
        }

        /**
         * Optional. If set, pressing the button will insert the bot's username and the specified inline query in
         * the current chat's input field. May be empty, in which case only the bot's username will be inserted.
         *
         * This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting
         * something from multiple options.
         *
         * @return string|null
         */
        public function getSwitchInlineQueryCurrentChat(): ?string
        {
            return $this->switch_inline_query_current_chat;
        }

        /**
         * Optional. Description of the game that will be launched when the user presses the button.
         * NOTE: This type of button must always be the first button in the first row.
         *
         * @return CallbackGame|null
         */
        public function getCallbackGame(): ?CallbackGame
        {
            return $this->callback_game;
        }

        /**
         * Optional. Specify True, to send a Pay button.
         * NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
         *
         * @see https://core.telegram.org/bots/api#payments
         * @return bool
         */
        public function isPay(): bool
        {
            return $this->pay;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'text' => $this->text ?? null,
                'url' => $this->url ?? null,
                'callback_data' => $this->callback_data ?? null,
                'web_app' => ($this->web_app instanceof WebAppInfo) ? $this->web_app->toArray() : null,
                'login_url' => ($this->login_url instanceof LoginUrl) ? $this->login_url->toArray() : null,
                'switch_inline_query' => $this->switch_inline_query ?? null,
                'switch_inline_query_current_chat' => $this->switch_inline_query_current_chat ?? null,
                'callback_game' => ($this->callback_game instanceof CallbackGame) ? $this->callback_game->toArray() : null,
                'pay' => $this->pay ?? null
            ];
        }

        /**
         * Constructs a new InlineKeyboardButton object from an array
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->text = $data['text'] ?? null;
            $object->url = $data['url'] ?? null;
            $object->callback_data = $data['callback_data'] ?? null;
            $object->web_app = ($data['web_app'] ?? null) ? WebAppInfo::fromArray($data['web_app']) : null;
            $object->login_url = ($data['login_url'] ?? null) ? LoginUrl::fromArray($data['login_url']) : null;
            $object->switch_inline_query = $data['switch_inline_query'] ?? null;
            $object->switch_inline_query_current_chat = $data['switch_inline_query_current_chat'] ?? null;
            $object->callback_game = ($data['callback_game'] ?? null) ? CallbackGame::fromArray($data['callback_game']) : null;
            $object->pay = $data['pay'] ?? null;

            return $object;
        }
    }