<?php

    namespace TgBotLib;

    use InvalidArgumentException;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Update;
    use function PHPUnit\Framework\isEmpty;

    class WebhookBot extends Bot
    {
        private const string SECRET_TOKEN_HEADER = 'X-Telegram-Bot-Api-Secret-Token';

        private ?string $secretToken;

        /**
         * Constructor for the class, initializing with a Bot instance.
         *
         * @param string $token
         * @param string $endpoint
         */
        public function __construct(string $token, string $endpoint='https://api.telegram.org')
        {
            parent::__construct($token, $endpoint);
            $this->secretToken = null;
        }

        /**
         * Retrieves the secret token used for validating requests.
         *
         * @return string The secret token.
         */
        public function getSecretToken(): string
        {
            return $this->secretToken;
        }

        /**
         * Sets the secret token for validating incoming webhook requests. This method validates the provided
         * secret token, ensuring it is not empty and does not exceed 256 characters in length. If the token
         * is valid, it is stored; if null is passed, it clears the stored secret token.
         *
         * @param string|null $secretToken The secret token to be set, or null to clear the token.
         * @return void
         * @throws InvalidArgumentException If the secret token is empty or exceeds 256 characters in length.
         */
        public function setSecretToken(?string $secretToken): void
        {
            if(is_null($secretToken))
            {
                $this->secretToken = null;
                return;
            }

            if(isEmpty($secretToken))
            {
                throw new InvalidArgumentException('Secret token cannot be empty.');
            }

            if(strlen($secretToken) > 256)
            {
                throw new InvalidArgumentException('Secret token cannot be longer than 256 characters.');
            }

            $this->secretToken = $secretToken;
        }

        /**
         * Handles the update from the webhook request. This method ensures that the request is a POST request,
         * contains valid input, and optionally checks for a valid secret token if one is set. It then decodes
         * the input JSON and converts it to an Update object.
         *
         * @return Update The decoded update object from the webhook request.
         * @throws TelegramException If the request method is not POST, input is empty, invalid secret token is provided, or JSON input is invalid.
         */
        public function getUpdate(): Update
        {
            if($_SERVER['REQUEST_METHOD'] !== 'POST')
            {
                throw new TelegramException('The Webhook request must be a POST request');
            }

            $input = file_get_contents('php://input');

            if(empty($input))
            {
                throw new TelegramException('The Webhook request did not provide any input');
            }

            if($this->secretToken !== null)
            {
                if(!isset($_SERVER[self::SECRET_TOKEN_HEADER]) || $_SERVER[self::SECRET_TOKEN_HEADER] !== $this->secretToken)
                {
                    throw new TelegramException('The Webhook request provided an invalid secret token');
                }
            }

            $decoded = json_decode($input, true);
            if($decoded === null)
            {
                throw new TelegramException('The Webhook request provided an invalid JSON input: ' . json_last_error_msg());
            }

            return Update::fromArray($decoded);
        }
    }