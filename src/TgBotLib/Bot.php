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
    use ReflectionMethod;
    use ReflectionParameter;
    use TgBotLib\Abstracts\Method;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;

    /**
     * @method getMe() Get information about the bot.
     * @method logOut() Log out from the cloud Bot API server.
     * @method close() Close the bot instance before moving it from one local server to another.
     * @method sendMessage(string $chat_id, string $text, ?int $message_thread_id=null) Send a message to a chat.
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

            $requiredParameters = $methodClass::getRequiredParameters();
            $optionalParameters = $methodClass::getOptionalParameters();
            $parameters = [];

            // Support named arguments as associative array
            if (count($arguments) === 1 && is_array($arguments[0]))
            {
                $parameters = $arguments[0];
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
            foreach ($requiredParameters as $param => $type)
            {
                if (!isset($parameters[$param]))
                {
                    throw new InvalidArgumentException("Required parameter '{$param}' is missing");
                }
            }

            return $parameters;
        }
    }