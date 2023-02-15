<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib;

    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Telegram\Update;

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
         * @param array $params
         * @return Update[]
         * @throws TelegramException
         */
        public function getUpdates(array $params=[]): array
        {
            if(!isset($params['offset']))
                $params['offset'] = $this->last_update_id + 1;


            $results = array_map(function ($update) {
                return Update::fromArray($update);
            }, $this->sendRequest('getUpdates', $params));

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
         * @param array $params
         * @return bool
         * @throws TelegramException
         */
        public function setWebhook(array $params=[]): bool
        {
            $this->sendRequest('setWebhook', $params);
            return true;
        }

    }