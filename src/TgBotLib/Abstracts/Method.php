<?php

    namespace TgBotLib\Abstracts;

    use CURLFile;
    use CurlHandle;
    use InvalidArgumentException;
    use TgBotLib\Bot;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    abstract class Method
    {
        /**
         * Executes a bot command with the given parameters.
         *
         * @param Bot $bot The bot instance on which the command is to be executed.
         * @param array $parameters The parameters required for the bot command.
         * @return ObjectTypeInterface|ObjectTypeInterface[]|mixed The result of the bot command.
         * @throws TelegramException if the response from the bot command is not valid.
         * @throws InvalidArgumentException if the required parameters are not provided.
         */
        public abstract static function execute(Bot $bot, array $parameters=[]): mixed;

        /**
         * Retrieves a list of required parameters for a specific operation.
         *
         * @return array|null An array of required parameters.
         */
        public abstract static function getRequiredParameters(): ?array;

        /**
         * Retrieves the optional parameters for a request.
         *
         * @return array|null An array of optional parameters.
         */
        public abstract static function getOptionalParameters(): ?array;

        /**
         * Builds a cURL handle for making a POST request to a bot's endpoint.
         *
         * @param Bot $bot The bot object containing the endpoint information.
         * @param string $method
         * @param array|null $parameters An array of parameters to be sent in the POST request.
         * @return CurlHandle The configured cURL handle ready for execution.
         */
        protected static function buildPost(Bot $bot, string $method, ?array $parameters=null): CurlHandle
        {
            $curl = curl_init(sprintf('%s/bot%s/%s', $bot->getEndpoint(), $bot->getToken(), $method));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            if($parameters === null)
            {
                curl_setopt($curl, CURLOPT_POST, false);
            }
            else
            {
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($parameters));
            }

            return $curl;
        }

        /**
         * Builds a cURL handle for uploading a file to the Telegram API.
         *
         * @param Bot $bot The bot instance used to get the endpoint.
         * @param string $file_param The parameter name for the file to be uploaded.
         * @param string $file_path The file path of the file to be uploaded.
         * @param array $parameters Additional parameters to be included in the request.
         * @return CurlHandle The cURL handle configured for the file upload.
         */
        protected static function buildUpload(Bot $bot, string $method, string $file_param, string $file_path, array $parameters): CurlHandle
        {
            $curl = curl_init(sprintf('%s/%s?%s', $bot->getEndpoint(), $method, http_build_query($parameters)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);
            curl_setopt($curl, CURLOPT_POSTFIELDS, [
                $file_param => new CURLFile($file_path)
            ]);

            return $curl;
        }

        protected static function buildMultiUpload(Bot $bot, string $method, array $files, array $parameters): CurlHandle
        {
            $curl = curl_init(sprintf('%s/%s?%s', $bot->getEndpoint(), $method, http_build_query($parameters)));
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);

            $post_fields = [];
            foreach($files as $file_param => $file_path)
            {
                $post_fields[$file_param] = new CURLFile($file_path);
            }

            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields);
            return $curl;
        }

        /**
         * Executes a cURL request and processes the response.
         *
         * @param CurlHandle $curl The cURL handle to be executed.
         * @return array The decoded response from the cURL request.
         * @throws TelegramException if the response is not a valid array,
         *                           or if the 'ok' field is not set or is false.
         */
        protected  static function executeCurl(CurlHandle $curl): mixed
        {
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);

            if(!is_array($result))
            {
                throw new TelegramException('Invalid response from Telegram API');
            }

            if(!isset($result['ok']))
            {
                throw new TelegramException('Invalid response from Telegram API');
            }

            if($result['ok'] === false)
            {
                throw new TelegramException($result['description'], (int)$result['error_code']);
            }

            return $result['result'];
        }
}