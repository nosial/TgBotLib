<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\CallbackGame;
    use TgBotLib\Objects\LoginUrl;
    use TgBotLib\Objects\WebAppInfo;

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
         * Label text on the button
         *
         * @param string $text
         * @return $this
         */
        public function setText(string $text): self
        {
            $this->text = $text;
            return $this;
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
         * Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used
         * to mention a user by their ID without using a username, if this is allowed by their privacy settings.
         *
         * @param string|null $url
         * @return $this
         */
        public function setUrl(?string $url): self
        {
            if(!Validate::url($url))
                throw new InvalidArgumentException(sprintf('Invalid url: %s', $url));

            $this->url = $url;
            return $this;
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
         * Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
         *
         * @param string|null $callbackData
         * @return $this
         */
        public function setCallbackData(?string $callbackData): self
        {
            if($callbackData == null)
            {
                $this->callback_data = null;
                return $this;
            }

            if(!Validate::length($callbackData, 1, 64))
                throw new InvalidArgumentException(sprintf('Invalid callback data length: %s', $callbackData));

            $this->callback_data = $callbackData;
            return $this;
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
         * Optional. Description of the Web App that will be launched when the user presses the button. The Web App will
         * be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only
         * in private chats between a user and the bot.
         *
         * @param WebAppInfo|null $webApp
         * @return $this
         */
        public function setWebApp(?WebAppInfo $webApp): self
        {
            $this->web_app = $webApp;
            return $this;
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
         * Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the
         * Telegram Login Widget.
         *
         * @param LoginUrl|null $loginUrl
         * @return $this
         */
        public function setLoginUrl(?LoginUrl $loginUrl): self
        {
            if(!Validate::url($loginUrl->getUrl()))
                throw new InvalidArgumentException(sprintf('Invalid login url: %s', $loginUrl->getUrl()));

            if(!Validate::isHttps($loginUrl->getUrl()))
                throw new InvalidArgumentException(sprintf('The login url must be https: %s', $loginUrl->getUrl()));

            $this->login_url = $loginUrl;
            return $this;
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
         * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and
         * insert the bot's username and the specified inline query in the input field. May be empty, in which case just
         * the bot's username will be inserted.
         *
         * Note: This offers an easy way for users to start using your bot in inline mode when they are currently in a
         * private chat with it. Especially useful when combined with switch_pm… actions - in this case the user will be
         * automatically returned to the chat they switched from, skipping the chat selection screen.
         *
         * @param string|null $switchInlineQuery
         * @return $this
         */
        public function setSwitchInlineQuery(?string $switchInlineQuery): self
        {
            $this->switch_inline_query = $switchInlineQuery;
            return $this;
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
         * Optional. If set, pressing the button will insert the bot's username and the specified inline query in the
         * current chat's input field. May be empty, in which case only the bot's username will be inserted.
         *
         * This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting
         * something from multiple options.
         *
         * @param string|null $switchInlineQueryCurrentChat
         * @return $this
         */
        public function setSwitchInlineQueryCurrentChat(?string $switchInlineQueryCurrentChat): self
        {
            $this->switch_inline_query_current_chat = $switchInlineQueryCurrentChat;
            return $this;
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

        /*
         * Optional. If set, pressing the button will insert the bot's username and the specified inline query in the
         * current chat's input field. May be empty, in which case only the bots username will be inserted.
         *
         * This offers a quick way for the user to open your bot in inline mode in the same chat -
         * good for selecting something from multiple options.
         */
        public function setCallbackGame(?CallbackGame $callbackGame): self
        {
            $this->callback_game = $callbackGame;
            return $this;
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
         * Optional. Specify True, to send a Pay button.
         *
         * NOTE: This type of button must always be the first button in the first row and can only be used in invoice
         * messages.
         *
         * @param bool $pay
         * @return $this
         */
        public function setPay(bool $pay): self
        {
            $this->pay = $pay;
            return $this;
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
                'web_app' => ($this->web_app instanceof ObjectTypeInterface) ? $this->web_app->toArray() : null,
                'login_url' => ($this->login_url instanceof ObjectTypeInterface) ? $this->login_url->toArray() : null,
                'switch_inline_query' => $this->switch_inline_query ?? null,
                'switch_inline_query_current_chat' => $this->switch_inline_query_current_chat ?? null,
                'callback_game' => ($this->callback_game instanceof ObjectTypeInterface) ? $this->callback_game->toArray() : null,
                'pay' => $this->pay ?? null
            ];
        }

        /**
         * Constructs a new InlineKeyboardButton object from an array
         *
         * @param array $data
         * @return InlineKeyboardButton
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->text = $data['text'] ?? null;
            $object->url = $data['url'] ?? null;
            $object->callback_data = $data['callback_data'] ?? null;
            $object->web_app = isset($data['web_app']) && is_array($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null;
            $object->login_url = isset($data['login_url']) && is_array($data['login_url']) ? LoginUrl::fromArray($data['login_url']) : null;
            $object->switch_inline_query = $data['switch_inline_query'] ?? null;
            $object->switch_inline_query_current_chat = $data['switch_inline_query_current_chat'] ?? null;
            $object->callback_game = isset($data['callback_game']) && is_array($data['callback_game']) ? CallbackGame::fromArray($data['callback_game']) : null;
            $object->pay = $data['pay'] ?? null;

            return $object;
        }
    }