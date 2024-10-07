<?php

    /**
     * Constructs a new Bot instance.
     *
     * @param string $token The bot token provided by BotFather.
     * @param string $endpoint The API endpoint to use.
     */

    namespace TgBotLib;

    use InvalidArgumentException;
    use ReflectionClass;
    use TgBotLib\Abstracts\Method;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Enums\Types\ParseMode;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\ForceReply;
    use TgBotLib\Objects\InlineKeyboardMarkup;
    use TgBotLib\Objects\LinkPreviewOptions;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyKeyboardMarkup;
    use TgBotLib\Objects\ReplyKeyboardRemove;
    use TgBotLib\Objects\ReplyParameters;
    use TgBotLib\Objects\User;

    /**
     * @method User getMe() A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
     * @method bool logOut() Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
     * @method bool close() Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
     * @method Message sendMessage(string|int $chat_id, string $text, ?string $business_connection_id=null, ?int $message_thread_id=null, string|ParseMode|null $parse_mode=null, ?array $entities=null, ?LinkPreviewOptions $link_preview_options=null, ?bool $disable_notification=null, ?bool $protect_content=null, ?string $message_effect_id=null, ?ReplyParameters $reply_parameters=null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup=null) Use this method to send text messages. On success, the sent Message is returned.
     * @method Message forwardMessage(string|int $chat_id, string|int $from_chat_id, int $message_id, ?int $message_thread_id=null, ?bool $disable_notification=null, ?bool $protect_content=null) Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded. On success, the sent Message is returned.
     */
    class Bot
    {
        private string $token;
        private string $endpoint;

        /**
         * Constructs a new Bot instance
         *
         * @param string $token The bot token provided by BotFather
         * @param string $endpoint The API endpoint to use
         */
        public function __construct(string $token, string $endpoint='https://api.telegram.org')
        {
            $this->token = $token;
            $this->endpoint = $endpoint;
        }

        /**
         * Sets the token for the bot.
         *
         * @param string $token The bot token provided by BotFather
         * @return void
         */
        public function setToken(string $token): void
        {
            $this->token = $token;
        }

        /**
         * Retrieves the bot's token
         *
         * @return string The bot token
         */
        public function getToken(): string
        {
            return $this->token;
        }

        /**
         * Sets the API endpoint.
         *
         * @param string $endpoint The new API endpoint to be set.
         * @return void
         */
        public function setEndpoint(string $endpoint): void
        {
            $this->endpoint = $endpoint;
        }

        /**
         * Retrieves the API endpoint or constructs a specific method endpoint
         *
         * @param string|null $method Optional method name to append to the endpoint
         * @return string The complete API endpoint URL
         */
        public function getEndpoint(string $method=null): string
        {
            if($method)
            {
                return sprintf('%s/bot%s/%s', $this->endpoint, $this->token, $method);
            }

            return $this->endpoint;
        }

        /**
         * Sends a request by executing the specified method with the given parameters.
         *
         * @param string $method The name of the method to execute.
         * @param array $parameters Optional parameters to pass to the method.
         * @return mixed The result of the executed method.
         * @throws TelegramException if the method execution fails.
         */
        public function sendRequest(string $method, array $parameters=[]): mixed
        {
            $method = Methods::tryFrom($method);
            if($method === null)
            {
                throw new InvalidArgumentException('Invalid method name');
            }

            return $method->execute($this, $parameters);
        }

        /**
         * Handles all undefined method calls.
         *
         * @param string $name The method name being called.
         * @param array $arguments The arguments passed to the method.
         * @return mixed The result of the executed method.
         * @throws TelegramException if the method execution fails.
         */
        public function __call(string $name, array $arguments): mixed
        {
            if (!Methods::tryFrom($name))
            {
                throw new InvalidArgumentException("Undefined method {$name}");
            }

            // Support named and positional arguments
            $parameters = $this->parseArguments($name, $arguments);
            return $this->sendRequest($name, $parameters);
        }

        /**
         * Parses arguments to handle both named and positional arguments.
         *
         * @param string $methodName The method name being called.
         * @param array $arguments The arguments passed to the method.
         * @return array The associative array of parameters.
         * @throws InvalidArgumentException
         */
        private function parseArguments(string $methodName, array $arguments): array
        {
            $methodClass = "TgBotLib\\Methods\\" . ucfirst($methodName);

            if (!class_exists($methodClass))
            {
                throw new InvalidArgumentException("Method class $methodClass does not exist");
            }

            // Instantiate the method class
            $reflectionClass = new ReflectionClass($methodClass);
            if (!$reflectionClass->isSubclassOf(Method::class))
            {
                throw new InvalidArgumentException("$methodClass is not a valid Method class");
            }

            $requiredParameters = $methodClass::getRequiredParameters() ?? [];
            $optionalParameters = $methodClass::getOptionalParameters() ?? [];

            // Convert null to an empty array for seamless handling
            $requiredParameters = is_null($requiredParameters) ? [] : $requiredParameters;
            $optionalParameters = is_null($optionalParameters) ? [] : $optionalParameters;

            $parameters = [];

            // If arguments are provided as an associative array (named arguments)
            if (is_array($arguments) && array_keys($arguments) !== range(0, count($arguments) - 1))
            {
                $parameters = $arguments;
            }
            else
            {
                // Handle positional arguments
                $paramKeys = array_merge(array_keys($requiredParameters), array_keys($optionalParameters));
                foreach ($arguments as $index => $arg)
                {
                    if (isset($paramKeys[$index]))
                    {
                        $parameters[$paramKeys[$index]] = $arg;
                    }
                }
            }

            // Validate required parameters
            foreach ($requiredParameters as $param)
            {
                if (!isset($parameters[$param]))
                {
                    throw new InvalidArgumentException("Required parameter '{$param}' is missing");
                }
            }

            return $parameters;
        }
    }