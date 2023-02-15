<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib;

    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Telegram\Message;
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
        public function sendRequest(string $method, array $params=[]): array
        {
            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $this->getMethodUrl($method),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $params,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: multipart/form-data'
                ]
            ]);

            $response = curl_exec($ch);
            print_r($response);
            if ($response === false)
                throw new TelegramException('curl error: ' . curl_error($ch), curl_errno($ch));

            curl_close($ch);
            $parsed = json_decode($response, true);
            if($parsed['ok'] === false)
                throw new TelegramException($parsed['description'], $parsed['error_code']);

            return $parsed['result'];
        }


        /**
         * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
         *
         * @param array $options Optional parameters
         * @return Update[]
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getupdates
         * @see https://en.wikipedia.org/wiki/Push_technology#Long_polling
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
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setwebhook
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
         * @param bool $drop_pending_updates Pass True to drop all pending updates
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#deletewebhook
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
         * @link https://core.telegram.org/bots/api#getwebhookinfo
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
         * @link https://core.telegram.org/bots/api#getme
         */
        public function getMe(): User
        {
            return User::fromArray($this->sendRequest('getMe'));
        }

        /**
         * Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out
         * the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After
         * a successful call, you can immediately log in on a local server, but will not be able to log in back to the
         * cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
         *
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#logout
         */
        public function logout(): bool
        {
            $this->sendRequest('logout');
            return true;
        }

        /**
         * Use this method to close the bot instance before moving it from one local server to another. You need to
         * delete the webhook before calling this method to ensure that the bot isn't launched again after server
         * restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on
         * success. Requires no parameters.
         *
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#close
         */
        public function close(): bool
        {
            $this->sendRequest('close');
            return true;
        }

        /**
         * Use this method to send text messages. On success, the sent Message is returned.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendmessage
         */
        public function sendMessage(string $chat_id, string $text, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendMessage', array_merge($options, [
                'chat_id' => $chat_id,
                'text' => $text
            ])));
        }

        /**
         * Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent
         * Message is returned.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
         * @param int $message_id Message identifier in the chat specified in from_chat_id
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#forwardmessage
         */
        public function forwardMessage(string $chat_id, string $from_chat_id, int $message_id, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('forwardMessage', array_merge($options, [
                'chat_id' => $chat_id,
                'from_chat_id' => $from_chat_id,
                'message_id' => $message_id
            ])));
        }

        /**
         * Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. A quiz
         * poll can be copied only if the value of the field correct_option_id is known to the bot. The method is
         * analogous to the method forwardMessage, but the copied message doesn't have a link to the original message.
         * Returns the MessageId of the sent message on success.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
         * @param int $message_id Message identifier in the chat specified in from_chat_id
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#copymessage
         */
        public function copyMessage(string $chat_id, string $from_chat_id, int $message_id, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('copyMessage', array_merge($options, [
                'chat_id' => $chat_id,
                'from_chat_id' => $from_chat_id,
                'message_id' => $message_id
            ])));
        }

        /**
         * Use this method to send photos. On success, the sent Message is returned.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $photo Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendphoto
         */
        public function sendPhoto(string $chat_id, string $photo, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendPhoto', array_merge($options, [
                'chat_id' => $chat_id,
                'photo' => (file_exists($photo) ? "@{$photo}" : $photo)
            ])));
        }

        /**
         * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your
         * audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send
         * audio files of up to 50 MB in size, this limit may be changed in the future.
         *
         * For sending voice messages, use the sendVoice method instead.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $audio Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendaudio
         */
        public function sendAudio(string $chat_id, string $audio, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendAudio', array_merge($options, [
                'chat_id' => $chat_id,
                'audio' => (file_exists($audio) ? "@{$audio}" : $audio)
            ])));
        }

        /**
         * Use this method to send general files. On success, the sent Message is returned. Bots can currently send
         * files of any type of up to 50 MB in size, this limit may be changed in the future.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $document File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#senddocument
         */
        public function sendDocument(string $chat_id, string $document, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendDocument', array_merge($options, [
                'chat_id' => $chat_id,
                'document' => (file_exists($document) ? "@{$document}" : $document)
            ])));
        }

        /**
         * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as
         * Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in
         * size, this limit may be changed in the future.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $video Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendvideo
         */
        public function sendVideo(string $chat_id, string $video, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendVideo', array_merge($options, [
                'chat_id' => $chat_id,
                'video' => (file_exists($video) ? "@{$video}" : $video)
            ])));
        }

        /**
         * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent
         * Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be
         * changed in the future.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $animation Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendanimation
         */
        public function sendAnimation(string $chat_id, string $animation, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendAnimation', array_merge($options, [
                'chat_id' => $chat_id,
                'animation' => (file_exists($animation) ? "@{$animation}" : $animation)
            ])));
        }

        /**
         * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice
         * message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent
         * as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of
         * up to 50 MB in size, this limit may be changed in the future.
         *
         * @param string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $voice Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendvoice
         */
        public function sendVoice(string $chat_id, string $voice, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendVoice', array_merge($options, [
                'chat_id' => $chat_id,
                'voice' => (file_exists($voice) ? "@{$voice}" : $voice)
            ])));
        }
    }