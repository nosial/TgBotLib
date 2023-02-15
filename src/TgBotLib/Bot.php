<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib;

    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Telegram\Update;
    use TgBotLib\Objects\Telegram\User;
    use TgBotLib\Objects\Telegram\WebhookInfo;

    class Bot
    {
        /**
         * @var string
         */
        private $token;

        /**
         * @var string
         */
        private $host;

        /**
         * @var bool
         */
        private $ssl;

        /**
         * @var int
         */
        private $last_update_id;

        /**
         * Public Constructor
         *
         * @param string $token
         */
        public function __construct(string $token)
        {
            $this->token = $token;
            $this->host = 'api.telegram.org';
            $this->ssl = true;
            $this->last_update_id = 0;
        }

        /**
         * Returns the bot's token
         *
         * @return string
         */
        public function getToken(): string
        {
            return $this->token;
        }

        /**
         * Returns the host the library is using to send requests to
         *
         * @return string
         */
        public function getHost(): string
        {
            return $this->host;
        }

        /**
         * Sets the host the library will use to send requests to
         *
         * @param string $host
         */
        public function setHost(string $host): void
        {
            $this->host = $host;
        }

        /**
         * Returns whether the library is using SSL to send requests
         *
         * @return bool
         */
        public function isSsl(): bool
        {
            return $this->ssl;
        }

        /**
         * Sets whether the library will use SSL to send requests
         *
         * @param bool $ssl
         */
        public function setSsl(bool $ssl): void
        {
            $this->ssl = $ssl;
        }

        /**
         * Returns the URL for the specified method using the current host and SSL settings
         *
         * @param string $method
         * @return string
         */
        private function getMethodUrl(string $method): string
        {
            return ($this->ssl ? 'https://' : 'http://') . $this->host . '/bot' . $this->token . '/' . $method;
        }

        /**
         * Sends a request to the Telegram API and returns the result as an array (unparsed)
         *
         * @param string $method
         * @param array $params
         * @return array
         * @throws TelegramException
         */
        public function sendRequest(string $method, array $params = []): array
        {
            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $this->getMethodUrl($method),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($params),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_AUTOREFERER => true,
                CURLOPT_HEADER => false,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_TIMEOUT => 30,
            ]);
            $response = curl_exec($ch);
            if ($response === false)
                throw new TelegramException('Curl error: ' . curl_error($ch), curl_errno($ch));

            curl_close($ch);
            $parsed = json_decode($response, true);
            if($parsed['ok'] === false)
                throw new TelegramException($parsed['description'], $parsed['error_code']);

            return $parsed['result'];
        }


        /**
         * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
         *
         * @param array $options
         * @return Update[]
         * @throws TelegramException
         */
        public function getUpdates(array $options=[]): array
        {
            if(!isset($options['offset']))
                $options['offset'] = $this->last_update_id + 1;


            $results = array_map(function ($update) {
                return Update::fromArray($update);
            }, $this->sendRequest('getUpdates', $options));

            if(count($results) > 0)
                $this->last_update_id = $results[count($results) - 1]->getUpdateId();

            return $results;
        }

        /**
         * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an
         * update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized
         * Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts.
         * Returns True on success.
         *
         * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter
         * secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the
         * secret token as content.
         *
         * @param string $url HTTPS URL to send updates to. Use an empty string to remove webhook integration
         * @param array $options
         * @return bool
         * @throws TelegramException
         */
        public function setWebhook(string $url, array $options=[]): bool
        {
            $this->sendRequest('setWebhook', array_merge($options, [
                'url' => $url
            ]));
            return true;
        }

        /**
         * Use this method to remove webhook integration if you decide to switch back to getUpdates.
         * Returns True on success.
         *
         * @param bool $drop_pending_updates
         * @return bool
         * @throws TelegramException
         */
        public function deleteWebhook(bool $drop_pending_updates=false): bool
        {
            $this->sendRequest('deleteWebhook', [
                'drop_pending_updates' => $drop_pending_updates
            ]);

            return true;
        }

        /**
         * Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo
         * object. If the bot is using getUpdates, will return an object with the url field empty.
         *
         * @return WebhookInfo
         * @throws TelegramException
         */
        public function getWebhookInfo(): WebHookInfo
        {
            return WebhookInfo::fromArray($this->sendRequest('getWebhookInfo'));
        }

        /**
         * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic
         * information about the bot in form of a User object.
         *
         * @return User
         * @throws TelegramException
         */
        public function getMe(): User
        {
            return User::fromArray($this->sendRequest('getMe'));
        }
    }