<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class LoginUrl implements ObjectTypeInterface
    {
        private string $url;
        private ?string $forward_text;
        private ?string $bot_username;
        private bool $request_write_access;

        /**
         * An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed.
         * If the user refuses to provide authorization data, the original URL without information about the user will
         * be opened. The data added is the same as described in Receiving authorization data.
         *
         * @see https://core.telegram.org/widgets/login#receiving-authorization-data
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * Optional. New text of the button in forwarded messages.
         *
         * @return string|null
         */
        public function getForwardText(): ?string
        {
            return $this->forward_text;
        }

        /**
         * Optional. Username of a bot, which will be used for user authorization. See Setting up a bot for more details.
         * If not specified, the current bot's username will be assumed. The url's domain must be the same as the domain
         * linked with the bot. See Linking your domain to the bot for more details.
         *
         * @see https://core.telegram.org/widgets/login#setting-up-a-bot
         * @see https://core.telegram.org/widgets/login#linking-your-domain-to-the-bot
         * @return string|null
         */
        public function getBotUsername(): ?string
        {
            return $this->bot_username;
        }

        /**
         * Optional. Pass True to request the permission for your bot to send messages to the user.
         *
         * @return bool
         */
        public function getRequestWriteAccess(): bool
        {
            return $this->request_write_access;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'url' => $this->url,
                'forward_text' => $this->forward_text,
                'bot_username' => $this->bot_username,
                'request_write_access' => $this->request_write_access
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): LoginUrl
        {
            if($data === null)
            {
                $data = [];
            }

            $object = new self();
            $object->url = $data['url'] ?? null;
            $object->forward_text = $data['forward_text'] ?? null;
            $object->bot_username = $data['bot_username'] ?? null;
            $object->request_write_access = $data['request_write_access'] ?? false;

            return $object;
        }
    }