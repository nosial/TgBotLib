<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib;

    use CURLFile;
    use Exception;
    use InvalidArgumentException;
    use LogLib\Log;
    use TempFile\TempFile;
    use TgBotLib\Abstracts\ChatMemberStatus;
    use TgBotLib\Abstracts\EventType;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Interfaces\CommandInterface;
    use TgBotLib\Interfaces\EventInterface;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\BotCommandScope;
    use TgBotLib\Objects\Telegram\BotDescription;
    use TgBotLib\Objects\Telegram\Chat;
    use TgBotLib\Objects\Telegram\ChatAdministratorRights;
    use TgBotLib\Objects\Telegram\ChatInviteLink;
    use TgBotLib\Objects\Telegram\ChatMember;
    use TgBotLib\Objects\Telegram\File;
    use TgBotLib\Objects\Telegram\ForumTopic;
    use TgBotLib\Objects\Telegram\MenuButton;
    use TgBotLib\Objects\Telegram\Message;
    use TgBotLib\Objects\Telegram\Poll;
    use TgBotLib\Objects\Telegram\Sticker;
    use TgBotLib\Objects\Telegram\Update;
    use TgBotLib\Objects\Telegram\User;
    use TgBotLib\Objects\Telegram\UserProfilePhotos;
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
         * @var CommandInterface[]
         */
        private $command_handlers;

        /**
         * @var EventInterface[]
         */
        private $event_handlers;

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
            $this->command_handlers = [];
            $this->event_handlers = [];
        }

        /**
         * Returns the bot's token
         *
         * @return string
         * @noinspection PhpUnused
         */
        public function getToken(): string
        {
            return $this->token;
        }

        /**
         * Returns the host the library is using to send requests to
         *
         * @return string
         * @noinspection PhpUnused
         */
        public function getHost(): string
        {
            return $this->host;
        }

        /**
         * Sets the host the library will use to send requests to
         *
         * @param string $host
         * @noinspection PhpUnused
         */
        public function setHost(string $host): void
        {
            $this->host = $host;
        }

        /**
         * Returns whether the library is using SSL to send requests
         *
         * @return bool
         * @noinspection PhpUnused
         */
        public function isSsl(): bool
        {
            return $this->ssl;
        }

        /**
         * Sets whether the library will use SSL to send requests
         *
         * @param bool $ssl
         * @noinspection PhpUnused
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
            /** @noinspection HttpUrlsUsage */
            return ($this->ssl ? 'https://' : 'http://') . $this->host . '/bot' . $this->token . '/' . $method;
        }

        /**
         * Sends a request to the Telegram API and returns the result as an array (unparsed)
         *
         * @param string $method
         * @param array $params
         * @return array
         * @throws TelegramException
         * @noinspection DuplicatedCode
         */
        public function sendRequest(string $method, array $params=[]): mixed
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

            Log::debug('net.nosial.tgbotlib', sprintf('=> %s(%s)', $method, json_encode($params, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)));
            $response = curl_exec($ch);
            if ($response === false)
                throw new TelegramException('curl error: ' . curl_error($ch), curl_errno($ch));

            curl_close($ch);
            $parsed = json_decode($response, true);
            Log::debug('net.nosial.tgbotlib', sprintf('<= %s', $response));
            if($parsed['ok'] === false)
                throw new TelegramException($parsed['description'], $parsed['error_code']);

            return $parsed['result'];
        }

        /**
         * Sends a request to the Telegram API and returns the result as an array (unparsed)
         *
         * @param string $method
         * @param string $file_param
         * @param string $file_path
         * @param array $params
         * @return array
         * @throws TelegramException
         */
        public function sendFileUpload(string $method, string $file_param, string $file_path, array $params=[]): mixed
        {
            $ch = curl_init();

            curl_setopt_array($ch, [
                CURLOPT_URL => $this->getMethodUrl($method) . '?' . http_build_query($params),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => [
                    $file_param => new CURLFile($file_path)
                ],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: multipart/form-data'
                ]
            ]);

            Log::debug('net.nosial.tgbotlib', sprintf('=> %s {%s}', $method, json_encode($params, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)));
            $response = curl_exec($ch);
            if ($response === false)
                throw new TelegramException('curl error: ' . curl_error($ch), curl_errno($ch));

            curl_close($ch);
            $parsed = json_decode($response, true);
            Log::debug('net.nosial.tgbotlib', sprintf('<= %s', $response));
            if($parsed['ok'] === false)
                throw new TelegramException($parsed['description'], $parsed['error_code']);

            return $parsed['result'];
        }

        /**
         * Sets a command handler for the specified command
         *
         * @param string $command
         * @param CommandInterface $handler
         * @return void
         * @noinspection PhpUnused
         */
        public function setCommandHandler(string $command, CommandInterface $handler): void
        {
            $this->command_handlers[$command] = $handler;
        }

        /**
         * Sets multiple command handlers at once
         *
         * @param array $handlers
         * @return void
         * @noinspection PhpUnused
         */
        public function setCommandHandlers(array $handlers): void
        {
            foreach($handlers as $command => $handler)
            {
                $this->command_handlers[$command] = $handler;
            }
        }

        /**
         * Sets an event handler for the specified event
         *
         * @param string $event
         * @param EventInterface $handler
         * @return void
         * @noinspection PhpUnused
         */
        public function setEventHandler(string $event, EventInterface $handler): void
        {
            if(!in_array($event, EventType::All))
                throw new InvalidArgumentException('Invalid event type: ' . $event);
            $this->event_handlers[$event] = $handler;
        }

        /**
         * Sets multiple event handlers at once
         *
         * @param array $handlers
         * @return void
         * @noinspection PhpUnused
         */
        public function setEventHandlers(array $handlers): void
        {
            foreach($handlers as $event => $handler)
            {
                if(!in_array($event, EventType::All))
                    throw new InvalidArgumentException('Invalid event type: ' . $event);
                $this->event_handlers[$event] = $handler;
            }
        }

        /**
         * Removes the command handler for the specified command
         *
         * @param string $command
         * @return void
         * @noinspection PhpUnused
         */
        public function removeCommandHandler(string $command): void
        {
            unset($this->command_handlers[$command]);
        }

        /**
         * Removes the event handler for the specified event
         *
         * @param string $event
         * @return void
         * @noinspection PhpUnused
         */
        public function removeEventHandler(string $event): void
        {
            unset($this->event_handlers[$event]);
        }

        /**
         * Handles a single update object
         *
         * @param Update $update
         * @return void
         */
        public function handleUpdate(Update $update): void
        {
            // Process event handlers
            foreach($this->event_handlers as $event => $handler)
            {
                $do_handle = false;
                switch($event)
                {
                    case EventType::GenericUpdate:
                        $handler->handle($this, $update);
                        break;

                    case EventType::Message:
                        if(($update->getMessage() ?? null) !== null)
                        {
                            $do_handle = true;
                        }
                        break;

                    case EventType::EditedMessage:
                        if(($update->getEditedMessage() ?? null) !== null)
                        {
                            $do_handle = true;
                        }
                        break;

                    case EventType::GenericCommandMessage:
                        if(($update->getMessage() ?? null) !== null && ($update->getMessage()->getText() ?? null) !== null)
                        {
                            $text = $update->getMessage()->getText();
                            if(str_starts_with($text, '/'))
                            {
                                $do_handle = true;
                            }
                        }
                        break;

                    case EventType::ChatMemberJoined:
                        if(($update->getMessage() ?? null) !== null && ($update->getMessage()->getNewChatMembers() ?? null) !== null)
                        {
                            $do_handle = true;
                        }
                        break;

                    case EventType::ChatMemberLeft:
                        if(($update->getMessage() ?? null) !== null && ($update->getMessage()->getLeftChatMember() ?? null) !== null)
                        {
                            $do_handle = true;
                        }
                        break;

                    case EventType::ChatMemberKicked:
                           if(($update->getMyChatMember() ?? null) !== null && ($update->getMyChatMember()->getNewChatMember() ?? null) !== null)
                            {
                                if(
                                    $update->getMyChatMember()->getNewChatMember()->getStatus() === ChatMemberStatus::Kicked &&
                                    $update->getMyChatMember()->getNewChatMember()->getUntilDate() === null
                                )
                                {
                                    $do_handle = true;
                                }
                            }
                        break;

                    case EventType::ChatMemberBanned:
                        if(($update->getMyChatMember() ?? null) !== null && ($update->getMyChatMember()->getNewChatMember() ?? null) !== null)
                        {
                            if(
                                $update->getMyChatMember()->getNewChatMember()->getStatus() === ChatMemberStatus::Kicked &&
                                $update->getMyChatMember()->getNewChatMember()->getUntilDate() !== null
                            )
                            {
                                $do_handle = true;
                            }
                        }
                        break;

                    case EventType::ChatMemberUnrestricted:
                    case EventType::ChatMemberDemoted:
                    case EventType::ChatMemberUnbanned:
                        if(($update->getMyChatMember() ?? null) !== null && ($update->getMyChatMember()->getNewChatMember() ?? null) !== null)
                        {
                            if($update->getMyChatMember()->getNewChatMember()->getStatus() === ChatMemberStatus::Member)
                            {
                                $do_handle = true;
                            }
                        }
                        break;

                    case EventType::ChatMemberPromoted:
                        if(($update->getMyChatMember() ?? null) !== null && ($update->getMyChatMember()->getNewChatMember() ?? null) !== null)
                        {
                            if($update->getMyChatMember()->getNewChatMember()->getStatus() === ChatMemberStatus::Administrator)
                            {
                                $do_handle = true;
                            }
                        }
                        break;

                    case EventType::ChatMemberRestricted:
                        if(($update->getMyChatMember() ?? null) !== null && ($update->getMyChatMember()->getNewChatMember() ?? null) !== null)
                        {
                            if($update->getMyChatMember()->getNewChatMember()->getStatus() === ChatMemberStatus::Restricted)
                            {
                                $do_handle = true;
                            }
                        }
                        break;

                    case EventType::ChatTitleChanged:
                        if(($update->getMessage() ?? null) !== null && ($update->getMessage()->getNewChatTitle() ?? null) !== null)
                        {
                            $handler->handle($this, $update);
                        }
                        break;

                    case EventType::ChatPhotoChanged:
                        if(($update->getMessage() ?? null) !== null && ($update->getMessage()->getNewChatPhoto() ?? null) !== null)
                        {
                            $do_handle = true;
                        }
                        break;

                    case EventType::CallbackQuery:
                        if(($update->getCallbackQuery() ?? null) !== null)
                        {
                            $do_handle = true;
                        }
                        break;
                }

                if($do_handle)
                {
                    try
                    {
                        Log::verbose('net.nosial.tgbotlib', sprintf('%s handling event %s', get_class($handler), $event));
                        $handler->handle($this, $update);
                    }
                    catch(Exception $e)
                    {
                        Log::error('net.nosial.tgbotlib', sprintf('Unhandled exception while handling event %s: %s', $event, $e->getMessage()), $e);
                    }
                }
            }

            // Process command handlers
            if(($update->getMessage() ?? null) !== null && ($update->getMessage()->getText() ?? null) !== null)
            {
                $text = $update->getMessage()->getText();
                if(str_starts_with($text, '/'))
                {
                    $command = explode(' ', substr($text, 1))[0];
                    if(isset($this->command_handlers[$command]))
                    {
                        Log::verbose('net.nosial.tgbotlib', sprintf('%s handling command %s', get_class($this->command_handlers[$command]), $command));

                        try
                        {
                            $this->command_handlers[$command]->handle($this, $update);
                        }
                        catch(Exception $e)
                        {
                            Log::error('net.nosial.tgbotlib', sprintf('Unhandled exception while executing command %s: %s', $command, $e->getMessage()), $e);
                        }
                    }
                }
            }


        }

        /**
         * Handles all updates received from the Telegram API using long polling
         *
         * @param bool $run_forever
         * @return void
         * @throws TelegramException
         */
        public function handleGetUpdates(bool $run_forever = false): void
        {
            do
            {
                $updates = $this->getUpdates();
                foreach($updates as $update)
                {
                    $this->handleUpdate($update);
                }
            } while($run_forever);
        }

        /**
         * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
         *
         * @param array $options Optional parameters
         * @return Update[]
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getupdates
         * @see https://en.wikipedia.org/wiki/Push_technology#Long_polling
         * @noinspection PhpUnused
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
         * @noinspection PhpUnused
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
         * @noinspection PhpUnused
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
         * @noinspection PhpUnused
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
         * @noinspection PhpUnused
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
         * @noinspection PhpUnused
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
         * @noinspection PhpUnused
         */
        public function close(): bool
        {
            $this->sendRequest('close');
            return true;
        }

        /**
         * Use this method to send text messages. On success, the sent Message is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $text Text of the message to be sent, 1-4096 characters after entities parsing
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendmessage
         * @noinspection PhpUnused
         */
        public function sendMessage(string|int $chat_id, string $text, array $options=[]): Message
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
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
         * @param int $message_id Message identifier in the chat specified in from_chat_id
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#forwardmessage
         * @noinspection PhpUnused
         */
        public function forwardMessage(string|int $chat_id, string $from_chat_id, int $message_id, array $options=[]): Message
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
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $from_chat_id Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
         * @param int $message_id Message identifier in the chat specified in from_chat_id
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#copymessage
         * @noinspection PhpUnused
         */
        public function copyMessage(string|int $chat_id, string $from_chat_id, int $message_id, array $options=[]): Message
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
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $photo Photo to send. Pass a file_id as String to send a photo that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a photo from the Internet, or upload a new photo using multipart/form-data. The photo must be at most 10 MB in size. The photo's width and height must not exceed 10000 in total. Width and height ratio must be at most 20.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendphoto
         * @noinspection PhpUnused
         */
        public function sendPhoto(string|int $chat_id, string $photo, array $options=[]): Message
        {
            if(file_exists($photo))
            {
                return Message::fromArray($this->sendFileUpload('sendPhoto', 'photo', $photo, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $photo);

            try
            {
                $response = Message::fromArray($this->sendFileUpload('sendPhoto', 'photo', $tmp_file, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your
         * audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send
         * audio files of up to 50 MB in size, this limit may be changed in the future.
         *
         * For sending voice messages, use the sendVoice method instead.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $audio Audio file to send. Pass a file_id as String to send an audio file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an audio file from the Internet, or upload a new one using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendaudio
         * @noinspection PhpUnused
         */
        public function sendAudio(string|int $chat_id, string $audio, array $options=[]): Message
        {
            if(file_exists($audio))
            {
                return Message::fromArray($this->sendFileUpload('sendAudio', 'audio', $audio, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $audio);

            try
            {
                $response = Message::fromArray($this->sendFileUpload('sendAudio', 'audio', $tmp_file, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to send general files. On success, the sent Message is returned. Bots can currently send
         * files of any type of up to 50 MB in size, this limit may be changed in the future.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $document File to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#senddocument
         * @noinspection PhpUnused
         */
        public function sendDocument(string|int $chat_id, string $document, array $options=[]): Message
        {
            if(file_exists($document))
            {
                return Message::fromArray($this->sendFileUpload('sendDocument', 'document', $document, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $document);

            try
            {
                $response = Message::fromArray($this->sendFileUpload('sendDocument', 'document', $tmp_file, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as
         * Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in
         * size, this limit may be changed in the future.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $video Video to send. Pass a file_id as String to send a video that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a video from the Internet, or upload a new video using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendvideo
         * @noinspection PhpUnused
         */
        public function sendVideo(string|int $chat_id, string $video, array $options=[]): Message
        {
            if(file_exists($video))
            {
                return Message::fromArray($this->sendFileUpload('sendVideo', 'video', $video, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $video);

            try
            {
                $response = Message::fromArray($this->sendFileUpload('sendVideo', 'video', $tmp_file, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent
         * Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be
         * changed in the future.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $animation Animation to send. Pass a file_id as String to send an animation that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get an animation from the Internet, or upload a new animation using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendanimation
         * @noinspection PhpUnused
         */
        public function sendAnimation(string|int $chat_id, string $animation, array $options=[]): Message
        {
            if(file_exists($animation))
            {
                return Message::fromArray($this->sendFileUpload('sendAnimation', 'animation', $animation, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $animation);

            try
            {
                $response = Message::fromArray($this->sendFileUpload('sendAnimation', 'animation', $tmp_file, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice
         * message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent
         * as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of
         * up to 50 MB in size, this limit may be changed in the future.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $voice Audio file to send. Pass a file_id as String to send a file that exists on the Telegram servers (recommended), pass an HTTP URL as a String for Telegram to get a file from the Internet, or upload a new one using multipart/form-data.
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendvoice
         * @noinspection PhpUnused
         */
        public function sendVoice(string|int $chat_id, string $voice, array $options=[]): Message
        {
            if(file_exists($voice))
            {
                return Message::fromArray($this->sendFileUpload('sendVoice', 'voice', $voice, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $voice);

            try
            {
                $response = Message::fromArray($this->sendFileUpload('sendVoice', 'voice', $tmp_file, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to
         * send video messages. On success, the sent Message is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $video_note Video note to send. Pass a file_id as String to send a video note that exists on the Telegram servers (recommended) or upload a new video using multipart/form-data. (Sending video notes by a URL is currently unsupported)
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @noinspection PhpUnused
         */
        public function sendVideoNote(string|int $chat_id, string $video_note, array $options=[]): Message
        {
            if(file_exists($video_note))
            {
                return Message::fromArray($this->sendFileUpload('sendVideoNote', 'video_note', $video_note, array_merge($options, [
                    'chat_id' => $chat_id
                ])));
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $video_note);

            $response = Message::fromArray($this->sendFileUpload('sendVideoNote', 'video_note', $tmp_file, array_merge($options, [
                'chat_id' => $chat_id
            ])));

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files
         * can be only grouped on an album with messages of the same type. On success, an array of Messages that were
         * sent is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param array $media A JSON-serialized array describing messages to be sent, must include 2-10 items
         * @param array $options Optional parameters
         * @return array
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendmediagroup
         * @noinspection PhpUnused
         */
        public function sendMediaGroup(string|int $chat_id, array $media, array $options=[]): array
        {
            return array_map(function ($message)
            {
                return Message::fromArray($message);
            }, $this->sendRequest('sendMediaGroup', array_merge($options, [
                'chat_id' => $chat_id,
                'media' => array_map(function ($item)
                {
                    if($item instanceof ObjectTypeInterface)
                        return $item->toArray();
                    return $item;
                }, $media)
            ])));
        }

        /**
         * Use this method to send point on the map. On success, the sent Message is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param float $latitude Latitude of the location
         * @param float $longitude Longitude of the location
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @noinspection PhpUnused
         */
        public function sendLocation(string|int $chat_id, float $latitude, float $longitude, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendLocation', array_merge($options, [
                'chat_id' => $chat_id,
                'latitude' => $latitude,
                'longitude' => $longitude
            ])));
        }

        /**
         * Use this method to edit live location messages. A location can be edited until its live_period expires or
         * editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is
         * not an inline message, the edited Message is returned, otherwise True is returned.
         *
         * @param float $latitude Latitude of new location
         * @param float $longitude Longitude of new location
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @see https://core.telegram.org/bots/api#stopmessagelivelocation
         * @noinspection PhpUnused
         */
        public function editMessageLiveLocation(float $latitude, float $longitude, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('editMessageLiveLocation', array_merge($options, [
                'latitude' => $latitude,
                'longitude' => $longitude
            ])));
        }

        /**
         * Use this method to stop updating a live location message before live_period expires. On success, if the
         * message is not an inline message, the edited Message is returned, otherwise True is returned.
         *
         * @param array $options
         * @return Message
         * @throws TelegramException
         * @see https://core.telegram.org/bots/api#stopmessagelivelocation
         * @noinspection PhpUnused
         */
        public function stopMessageLiveLocation(array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('stopMessageLiveLocation', $options));
        }

        /**
         * Use this method to send information about a venue. On success, the sent Message is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param float $latitude Latitude of the venue
         * @param float $longitude Longitude of the venue
         * @param string $title Name of the venue
         * @param string $address Address of the venue
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @see https://core.telegram.org/bots/api#sendvenue
         * @noinspection PhpUnused
         */
        public function sendVenue(string|int $chat_id, float $latitude, float $longitude, string $title, string $address, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendVenue', array_merge($options, [
                'chat_id' => $chat_id,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'title' => $title,
                'address' => $address
            ])));
        }

        /**
         * Use this method to send phone contacts. On success, the sent Message is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $phone_number Contact's phone number
         * @param string $first_name Contact's first name
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @see https://core.telegram.org/bots/api#sendcontact
         * @noinspection PhpUnused
         */
        public function sendContact(string|int $chat_id, string $phone_number, string $first_name, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendContact', array_merge($options, [
                'chat_id' => $chat_id,
                'phone_number' => $phone_number,
                'first_name' => $first_name
            ])));
        }

        /**
         * Use this method to send a native poll. On success, the sent Message is returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $question Poll question, 1-300 characters
         * @param array $options A JSON-serialized list of answer options, 2-10 strings 1-100 characters each
         * @param array $params Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendpoll
         * @noinspection PhpUnused
         */
        public function sendPoll(string|int $chat_id, string $question, array $options, array $params=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendPoll', array_merge($params, [
                'chat_id' => $chat_id,
                'question' => $question,
                'options' => $options
            ])));
        }

        /**
         * Use this method to send an animated emoji that will display a random value. On success, the sent Message is
         * returned.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param array $params Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#senddice
         * @noinspection PhpUnused
         */
        public function sendDice(string|int $chat_id, array $params=[]): Message
        {
            return Message::fromArray($this->sendRequest('sendDice', array_merge($params, [
                'chat_id' => $chat_id
            ])));
        }

        /**
         * Use this method when you need to tell the user that something is happening on the bot's side. The status is
         * set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status).
         * Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive: typing for text messages, upload_photo for photos, record_video or upload_video for videos, record_voice or upload_voice for voice notes, upload_document for general files, choose_sticker for stickers, find_location for location data, record_video_note or upload_video_note for video notes.
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#sendchataction
         * @noinspection PhpUnused
         */
        public function sendChatAction(string|int $chat_id, string $action, array $options=[]): bool
        {
            $this->sendRequest('sendChatAction', array_merge($options, [
                'chat_id' => $chat_id,
                'action' => $action
            ]));

            return true;
        }

        /**
         * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
         *
         * @param int $user_id Unique identifier of the target user
         * @param array $options Optional parameters
         * @return UserProfilePhotos
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getuserprofilephotos
         * @noinspection PhpUnused
         */
        public function getUserProfilePhotos(int $user_id, array $options=[]): UserProfilePhotos
        {
            return UserProfilePhotos::fromArray($this->sendRequest('getUserProfilePhotos', array_merge($options, [
                'user_id' => $user_id
            ])));
        }

        /**
         * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots
         * can download files of up to 20MB in size. On success, a File object is returned. The file can then be
         * downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken
         * from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires,
         * a new one can be requested by calling getFile again.
         *
         * @param string $file_id File identifier to get information about
         * @return File
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getfile
         * @warning This function may not preserve the original file name and MIME type. You should save the file's MIME type and name (if available) when the File object is received.
         * @noinspection PhpUnused
         */
        public function getFile(string $file_id): File
        {
            return File::fromArray($this->sendRequest('getFile', [
                'file_id' => $file_id
            ]));
        }

        /**
         * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels,
         * the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first.
         * The bot must be an administrator in the chat for this to work and must have the appropriate administrator
         * rights. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target user
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#banchatmember
         * @noinspection PhpUnused
         */
        public function banChatMember(string|int $chat_id, int $user_id, array $options=[]): bool
        {
            $this->sendRequest('banChatMember', array_merge($options, [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]));

            return true;
        }

        /**
         * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the
         * group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for
         * this to work. By default, this method guarantees that after the call the user is not a member of the chat,
         * but will be able to join it. So if the user is a member of the chat they will also be removed from the chat.
         * If you don't want this, use the parameter only_if_banned. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target group or username of the target supergroup or channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target user
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#unbanchatmember
         * @noinspection PhpUnused
         */
        public function unbanChatMember(string|int $chat_id, int $user_id, array $options=[]): bool
        {
            $this->sendRequest('unbanChatMember', array_merge($options, [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]));

            return true;
        }

        /**
         * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for
         * this to work and must have the appropriate administrator rights. Pass True for all permissions to lift
         * restrictions from a user. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param int $user_id Unique identifier of the target user
         * @param array $permissions A JSON-serialized object for new user permissions (https://core.telegram.org/bots/api#chatpermissions)
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#restrictchatmember
         * @see https://core.telegram.org/bots/api#chatpermissions
         * @noinspection PhpUnused
         */
        public function restrictChatMember(string|int $chat_id, int $user_id, array $permissions, array $options=[]): bool
        {
            $this->sendRequest('restrictChatMember', array_merge($options, [
                'chat_id' => $chat_id,
                'user_id' => $user_id,
                'permissions' => $permissions
            ]));

            return true;
        }

        /**
         * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in
         * the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean
         * parameters to demote a user. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target user
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#promotechatmember
         * @noinspection PhpUnused
         */
        public function promoteChatMember(string|int $chat_id, int $user_id, array $options=[]): bool
        {
            $this->sendRequest('promoteChatMember', array_merge($options, [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]));

            return true;
        }

        /**
         * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param int $user_id Unique identifier of the target user
         * @param string $custom_title New custom title for the administrator; 0-16 characters, emoji are not allowed
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
         * @noinspection PhpUnused
         */
        public function setChatAdministratorCustomTitle(string|int $chat_id, int $user_id, string $custom_title): bool
        {
            $this->sendRequest('setChatAdministratorCustomTitle', [
                'chat_id' => $chat_id,
                'user_id' => $user_id,
                'custom_title' => $custom_title
            ]);

            return true;
        }

        /**
         * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of
         * the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an
         * administrator in the supergroup or channel for this to work and must have the appropriate administrator
         * rights. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target sender chat
         * @return bool
         * @throws TelegramException
         * @noinspection PhpUnused
         */
        public function banChatSenderChat(string|int $chat_id, int $user_id): bool
        {
            $this->sendRequest('banChatSenderChat', [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]);

            return true;
        }

        /**
         * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an
         * administrator for this to work and must have the appropriate administrator rights. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target sender chat
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#unbanchatsenderchat
         * @noinspection PhpUnused
         */
        public function unbanChatSenderChat(string|int $chat_id, int $user_id): bool
        {
            $this->sendRequest('unbanChatSenderChat', [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]);

            return true;
        }

        /**
         * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param array $permissions A JSON-serialized object for new default chat permissions (https://core.telegram.org/bots/api#chatpermissions)
         * @param bool $use_independent_chat_permissions Pass True if chat permissions are set independently. Otherwise, the can_send_other_messages and can_add_web_page_previews permissions will imply the can_send_messages, can_send_audios, can_send_documents, can_send_photos, can_send_videos, can_send_video_notes, and can_send_voice_notes permissions; the can_send_polls permission will imply the can_send_messages permission.
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchatpermissions
         * @noinspection PhpUnused
         */
        public function setChatPermissions(string|int $chat_id, array $permissions, bool $use_independent_chat_permissions=false): bool
        {
            $this->sendRequest('setChatPermissions', [
                'chat_id' => $chat_id,
                'permissions' => $permissions,
                'use_independent_chat_permissions' => $use_independent_chat_permissions
            ]);

            return true;
        }

        /**
         * Use this method to generate a new primary invite link for a chat; any previously generated primary link is
         * revoked. The bot must be an administrator in the chat for this to work and must have the appropriate
         * administrator rights. Returns the new invite link as String on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @return string
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#exportchatinvitelink
         * @noinspection PhpUnused
         */
        public function exportChatInviteLink(string|int $chat_id): string
        {
            return $this->sendRequest('exportChatInviteLink', [
                'chat_id' => $chat_id
            ]);
        }

        /**
         * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat
         * for this to work and must have the appropriate administrator rights. The link can be revoked using the method
         * revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param array $options Optional parameters
         * @return ChatInviteLink
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#createchatinvitelink
         * @noinspection PhpUnused
         */
        public function createChatInviteLink(string|int $chat_id, array $options=[]): ChatInviteLink
        {
            return ChatInviteLink::fromArray($this->sendRequest('createChatInviteLink', array_merge([
                'chat_id' => $chat_id
            ], $options)));
        }

        /**
         * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the
         * chat for this to work and must have the appropriate administrator rights. Returns the edited invite link
         * as a ChatInviteLink object.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $invite_link The invite link to edit
         * @param array $options Optional parameters
         * @return ChatInviteLink
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#editchatinvitelink
         * @noinspection PhpUnused
         */
        public function editChatInviteLink(string|int $chat_id, string $invite_link, array $options=[]): ChatInviteLink
        {
            return ChatInviteLink::fromArray($this->sendRequest('editChatInviteLink', array_merge([
                'chat_id' => $chat_id,
                'invite_link' => $invite_link
            ], $options)));
        }

        /**
         * @param string|int $chat_id
         * @param string $invite_link
         * @return ChatInviteLink
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#revokechatinvitelink
         * @noinspection PhpUnused
         */
        public function revokeChatInviteLink(string|int $chat_id, string $invite_link): ChatInviteLink
        {
            return ChatInviteLink::fromArray($this->sendRequest('revokeChatInviteLink', [
                'chat_id' => $chat_id,
                'invite_link' => $invite_link
            ]));
        }

        /**
         * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work
         * and must have the can_invite_users administrator right. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target user
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#approvechatjoinrequest
         * @noinspection PhpUnused
         */
        public function approveChatJoinRequest(string|int $chat_id, int $user_id): bool
        {
            $this->sendRequest('approveChatJoinRequest', [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]);

            return true;
        }

        /**
         * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work
         * and must have the can_invite_users administrator right. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target user
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#declinechatjoinrequest
         * @noinspection PhpUnused
         */
        public function declineChatJoinRequest(string|int $chat_id, int $user_id): bool
        {
            $this->sendRequest('declineChatJoinRequest', [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]);

            return true;
        }

        /**
         * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot
         * must be an administrator in the chat for this to work and must have the appropriate administrator rights.
         * Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $photo New chat photo, uploaded using multipart/form-data
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchatphoto
         * @noinspection PhpUnused
         */
        public function setChatPhoto(string|int $chat_id, string $photo): bool
        {
            if(file_exists($photo))
            {
                $this->sendFileUpload('sendChatPhoto', 'photo', $photo, [
                    'chat_id' => $chat_id
                ]);

                return true;
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $photo);

            try
            {
                $this->sendFileUpload('sendChatPhoto', 'photo', $tmp_file, [
                    'chat_id' => $chat_id
                ]);
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return true;
        }

        /**
         * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an
         * administrator in the chat for this to work and must have the appropriate administrator rights. Returns True
         * on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#deletechatphoto
         * @noinspection PhpUnused
         */
        public function deleteChatPhoto(string|int $chat_id): bool
        {
            $this->sendRequest('deleteChatPhoto', [
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an
         * administrator in the chat for this to work and must have the appropriate administrator rights. Returns True
         * on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $title New chat title, 1-128 characters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchattitle
         * @noinspection PhpUnused
         */
        public function setChatTitle(string|int $chat_id, string $title): bool
        {
            $this->sendRequest('setChatTitle', [
                'chat_id' => $chat_id,
                'title' => $title
            ]);

            return true;
        }

        /**
         * Use this method to change the description of a group, a supergroup or a channel. The bot must be an
         * administrator in the chat for this to work and must have the appropriate administrator rights. Returns True
         * on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param string $description New chat description, 0-255 characters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchatdescription
         * @noinspection PhpUnused
         */
        public function setChatDescription(string|int $chat_id, string $description): bool
        {
            $this->sendRequest('setChatDescription', [
                'chat_id' => $chat_id,
                'description' => $description
            ]);

            return true;
        }

        /**
         * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat,
         * the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages'
         * administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on
         * success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $message_id Identifier of a message to pin
         * @param bool $disable_notification Pass True if it is not necessary to send a notification to all chat members about the new pinned message. Notifications are always disabled in channels and private chats.
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#pinchatmessage
         * @noinspection PhpUnused
         */
        public function pinChatMessage(string|int $chat_id, int $message_id, bool $disable_notification=false): bool
        {
            $this->sendRequest('pinChatMessage', [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'disable_notification' => $disable_notification
            ]);

            return true;
        }

        /**
         * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private
         * chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages'
         * administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on
         * success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $message_id Identifier of a message to unpin. If not specified, the most recent pinned message (by sending date) will be unpinned.
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#unpinchatmessage
         * @noinspection PhpUnused
         */
        public function unpinChatMessage(string|int $chat_id, int $message_id): bool
        {
            $this->sendRequest('unpinChatMessage', [
                'chat_id' => $chat_id,
                'message_id' => $message_id
            ]);

            return true;
        }

        /**
         * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot
         * must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator
         * right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#unpinallchatmessages
         * @noinspection PhpUnused
         */
        public function unpinAllChatMessages(string|int $chat_id): bool
        {
            $this->sendRequest('unpinAllChatMessages', [
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#leavechat
         * @noinspection PhpUnused
         */
        public function leaveChat(string|int $chat_id): bool
        {
            $this->sendRequest('leaveChat', [
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to get up-to-date information about the chat (current name of the user for one-on-one
         * conversations, current username of a user, group or channel, etc.). Returns a Chat object on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
         * @return Chat
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getchat
         * @noinspection PhpUnused
         */
        public function getChat(string|int $chat_id): Chat
        {
            return Chat::fromArray($this->sendRequest('getChat', [
                'chat_id' => $chat_id
            ]));
        }

        /**
         * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember
         * objects.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
         * @return ChatMember[]
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getchatadministrators
         * @noinspection PhpUnused
         */
        public function getChatAdministrators(string|int $chat_id): array
        {
            return array_map(function ($item) {
                return ChatMember::fromArray($item);
            }, $this->sendRequest('getChatAdministrators', [
                'chat_id' => $chat_id
            ]));
        }

        /**
         * Use this method to get the number of members in a chat. Returns Int on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
         * @return int
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getchatmembercount
         * @noinspection PhpUnused
         */
        public function getChatMemberCount(string|int $chat_id): int
        {
            return $this->sendRequest('getChatMemberCount', [
                'chat_id' => $chat_id
            ]);
        }

        /**
         * Use this method to get information about a member of a chat. The method is only guaranteed to work for other
         * users if the bot is an administrator in the chat. Returns a ChatMember object on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup or channel (in the format @channelusername)
         * @param int $user_id Unique identifier of the target user
         * @return ChatMember
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getchatmember
         * @noinspection PhpUnused
         */
        public function getChatMember(string|int $chat_id, int $user_id): ChatMember
        {
            return ChatMember::fromArray($this->sendRequest('getChatMember', [
                'chat_id' => $chat_id,
                'user_id' => $user_id
            ]));
        }

        /**
         * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat
         * for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set
         * optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param string $sticker_set_name Name of the sticker set to be set as the group sticker set
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchatstickerset
         * @noinspection PhpUnused
         */
        public function setChatStickerSet(string|int $chat_id, string $sticker_set_name): bool
        {
            $this->sendRequest('setChatStickerSet', [
                'chat_id' => $chat_id,
                'sticker_set_name' => $sticker_set_name
            ]);

            return true;
        }

        /**
         * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat
         * for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set
         * optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#deletechatstickerset
         * @noinspection PhpUnused
         */
        public function deleteChatStickerSet(string|int $chat_id): bool
        {
            $this->sendRequest('deleteChatStickerSet', [
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires
         * no parameters. Returns an Array of Sticker objects.
         *
         * @return Sticker[]
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getforumtopiciconstickers
         * @noinspection PhpUnused
         */
        public function getForumTopicIconStickers(): array
        {
            return array_map(function ($item) {
                return Sticker::fromArray($item);
            }, $this->sendRequest('getForumTopicIconStickers'));
        }

        /**
         * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat
         * for this to work and must have the can_manage_topics administrator rights. Returns information about the
         * created topic as a ForumTopic object.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param string $name Topic name, 1-128 characters
         * @param array $options Optional parameters
         * @return ForumTopic
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#createforumtopic
         * @noinspection PhpUnused
         */
        public function createForumTopic(string|int $chat_id, string $name, array $options=[]): ForumTopic
        {
            return ForumTopic::fromArray($this->sendRequest('createForumTopic', array_merge([
                'chat_id' => $chat_id,
                'name' => $name
            ], $options)));
        }

        /**
         * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator
         * in the chat for this to work and must have can_manage_topics administrator rights, unless it is the creator
         * of the topic. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param string $name Unique identifier for the target message thread of the forum topic
         * @param array $options Optional parameters
         * @return ForumTopic
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#editforumtopic
         * @noinspection PhpUnused
         */
        public function editForumTopic(string|int $chat_id, string $name, array $options=[]): ForumTopic
        {
            return ForumTopic::fromArray($this->sendRequest('editForumTopic', array_merge([
                'chat_id' => $chat_id,
                'name' => $name
            ], $options)));
        }

        /**
         * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the
         * chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of
         * the topic. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#closeforumtopic
         * @noinspection PhpUnused
         */
        public function closeForumTopic(string|int $chat_id, int $message_thread_id): bool
        {
            $this->sendRequest('closeForumTopic',[
                'chat_id' => $chat_id,
                'message_thread_id' => $message_thread_id
            ]);

            return true;
        }

        /**
         * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the
         * chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of
         * the topic. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#reopenforumtopic
         * @noinspection PhpUnused
         */
        public function reopenForumTopic(string|int $chat_id, int $message_thread_id): bool
        {
            $this->sendRequest('reopenForumTopic',[
                'chat_id' => $chat_id,
                'message_thread_id' => $message_thread_id
            ]);

            return true;
        }

        /**
         * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must
         * be an administrator in the chat for this to work and must have the can_delete_messages administrator rights.
         * Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#deleteforumtopic
         * @noinspection PhpUnused
         */
        public function deleteForumTopic(string|int $chat_id, int $message_thread_id): bool
        {
            $this->sendRequest('deleteForumTopic',[
                'chat_id' => $chat_id,
                'message_thread_id' => $message_thread_id
            ]);

            return true;
        }

        /**
         * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in
         * the chat for this to work and must have the can_pin_messages administrator right in the supergroup.
         * Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param int $message_thread_id Unique identifier for the target message thread of the forum topic
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#unpinallforumtopicmessages
         * @noinspection PhpUnused
         */
        public function unpinAllForumTopicMessages(string|int $chat_id, int $message_thread_id): bool
        {
            $this->sendRequest('unpinAllForumTopicMessages',[
                'chat_id' => $chat_id,
                'message_thread_id' => $message_thread_id
            ]);

            return true;
        }

        /**
         * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an
         * administrator in the chat for this to work and must have can_manage_topics administrator rights.
         * Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @param string $name New topic name, 1-128 characters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#editgeneralforumtopic
         * @noinspection PhpUnused
         */
        public function editGeneralForumTopic(string|int $chat_id, string $name): bool
        {
            $this->sendRequest('editGeneralForumTopic',[
                'chat_id' => $chat_id,
                'name' => $name
            ]);

            return true;
        }

        /**
         * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator
         * in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#closegeneralforumtopic
         * @noinspection PhpUnused
         */
        public function closeGeneralForumTopic(string|int $chat_id): bool
        {
            $this->sendRequest('closeGeneralForumTopic',[
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an
         * administrator in the chat for this to work and must have the can_manage_topics administrator rights.
         * The topic will be automatically unhidden if it was hidden. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#reopengeneralforumtopic
         * @noinspection PhpUnused
         */
        public function reopenGeneralForumTopic(string|int $chat_id): bool
        {
            $this->sendRequest('reopenGeneralForumTopic',[
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in
         * the chat for this to work and must have the can_manage_topics administrator rights. The topic will be
         * automatically closed if it was open. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#hidegeneralforumtopic
         * @noinspection PhpUnused
         */
        public function hideGeneralForumTopic(string|int $chat_id): bool
        {
            $this->sendRequest('hideGeneralForumTopic',[
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in
         * the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
         *
         * @param string|int $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#unhidegeneralforumtopic
         * @noinspection PhpUnused
         */
        public function unhideGeneralForumTopic(string|int $chat_id): bool
        {
            $this->sendRequest('unhideGeneralForumTopic',[
                'chat_id' => $chat_id
            ]);

            return true;
        }

        /**
         * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed
         * to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
         *
         * @param string $callback_query_id Unique identifier for the query to be answered
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#answercallbackquery
         * @noinspection PhpUnused
         */
        public function answerCallbackQuery(string $callback_query_id, array $options=[]): bool
        {
            $this->sendRequest('answerCallbackQuery', array_merge([
                'callback_query_id' => $callback_query_id
            ], $options));

            return true;
        }

        /**
         * Use this method to change the list of the bot's commands.
         * Returns True on success.
         *
         * @param array $commands A list of bot commands to be set as the list of the bot's commands. At most 100 commands can be specified.
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setmycommands
         * @see https://core.telegram.org/bots/features#commands See this manual for more details about bot commands.
         * @noinspection PhpUnused
         */
        public function setMyCommands(array $commands, array $options=[]): bool
        {
            $this->sendRequest('setMyCommands', array_merge([
                'commands' => $commands
            ], $options));

            return true;
        }

        /**
         * Use this method to delete the list of the bot's commands for the given scope and user language. After
         * deletion, higher level commands will be shown to affected users. Returns True on success.
         *
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#deletemycommands
         * @noinspection PhpUnused
         */
        public function deleteMyCommands(array $options=[]): bool
        {
            $this->sendRequest('deleteMyCommands', $options);

            return true;
        }

        /**
         * Use this method to get the current list of the bot's commands for the given scope and user language. Returns
         * an Array of BotCommand objects. If commands aren't set, an empty list is returned.
         *
         * @param array $options Optional parameters
         * @return BotCommandScope[]
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getmycommands
         * @noinspection PhpUnused
         */
        public function getMyCommands(array $options=[]): array
        {
            return array_map(function ($command) {
                return BotCommandScope::fromArray($command);
            }, $this->sendRequest('getMyCommands', $options));
        }

        /**
         * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty.
         * Returns True on success.
         *
         * @param string|null $description New bot description; 0-512 characters. Pass an empty string to remove the dedicated description for the given language.
         * @param string|null $language_code A two-letter ISO 639-1 language code. If empty, the description will be applied to all users for whose language there is no dedicated description.
         * @param array $options
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setmydescription
         * @noinspection PhpUnused
         */
        public function setMyDescription(?string $description=null, ?string $language_code=null, array $options=[]): bool
        {
            $this->sendRequest('setMyDescription', array_merge([
                'description' => $description,
                'language_code' => $language_code
            ], $options));

            return true;
        }

        /**
         * Use this method to get the current bot description for the given user language.
         * Returns BotDescription on success.
         *
         * @param string|null $language_code
         * @param array $options
         * @return BotDescription
         * @throws TelegramException
         */
        public function getMyDescription(?string $language_code=null, array $options=[]): BotDescription
        {
            return BotDescription::fromArray($this->sendRequest('getMyDescription', array_merge([
                'language_code' => $language_code
            ], $options)));
        }

        /**
         * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent
         * together with the link when users share the bot. Returns True on success.
         *
         * @param string|null $short_description New short description for the bot; 0-120 characters. Pass an empty string to remove the dedicated short description for the given language.
         * @param string|null $language_code A two-letter ISO 639-1 language code. If empty, the short description will be applied to all users for whose language there is no dedicated short description.
         * @param array $options
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setmyshortdescription
         * @noinspection PhpUnused
         */
        public function setMyShortDescription(?string $short_description=null, ?string $language_code=null, array $options=[]): bool
        {
            $this->sendRequest('setMyShortDescription', array_merge([
                'short_description' => $short_description,
                'language_code' => $language_code
            ], $options));

            return true;
        }

        /**
         * Use this method to change the bot's menu button in a private chat, or the default menu button.
         * Returns True on success.
         *
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setchatmenubutton
         * @noinspection PhpUnused
         */
        public function setChatMenuButton(array $options=[]): bool
        {
            $this->sendRequest('setChatMenuButton', $options);
            return true;
        }

        /**
         * Use this method to get the current value of the bot's menu button in a private chat, or the default menu
         * button. Returns MenuButton on success.
         *
         * @param array $options Optional parameters
         * @return MenuButton
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getchatmenubutton
         * @noinspection PhpUnused
         */
        public function getChatMenuButton(array $options=[]): MenuButton
        {
            return MenuButton::fromArray($this->sendRequest('getChatMenuButton', $options));
        }

        /**
         * Use this method to change the default administrator rights requested by the bot when it's added as an
         * administrator to groups or channels. These rights will be suggested to users, but they are are free to
         * modify the list before adding the bot. Returns True on success.
         *
         * @param array $options Optional parameters
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#setmydefaultadministratorrights
         * @noinspection PhpUnused
         */
        public function setMyDefaultAdministratorRights(array $options=[]): bool
        {
            $this->sendRequest('setMyDefaultAdministratorRights', $options);
            return true;
        }

        /**
         * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights
         * on success.
         *
         * @param bool $for_channels Pass True to get default administrator rights of the bot in channels. Otherwise, default administrator rights of the bot for groups and supergroups will be returned.
         * @return ChatAdministratorRights
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#getmydefaultadministratorrights
         * @noinspection PhpUnused
         */
        public function getMyDefaultAdministratorRights(bool $for_channels=false): ChatAdministratorRights
        {
            return ChatAdministratorRights::fromArray($this->sendRequest('getMyDefaultAdministratorRights', [
                'for_channels' => $for_channels
            ]));
        }

        /**
         * Use this method to edit text and game messages. On success, if the edited message is not an inline message,
         * the edited Message is returned, otherwise True is returned.
         *
         * @param string $text New text of the message, 1-4096 characters after entities parsing
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#editmessagetext
         * @noinspection PhpUnused
         */
        public function editMessageText(string $text, array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('editMessageText', array_merge([
                'text' => $text
            ], $options)));
        }

        /**
         * Use this method to edit captions of messages. On success, if the edited message is not an inline message,
         * the edited Message is returned, otherwise True is returned.
         *
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#editmessagecaption
         * @noinspection PhpUnused
         */
        public function editMessageCaption(array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('editMessageCaption', $options));
        }

        /**
         * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a
         * message album, then it can be edited only to an audio for audio albums, only to a document for document
         * albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded;
         * use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an
         * inline message, the edited Message is returned, otherwise True is returned.
         *
         * @param string $media
         * @param array $options
         * @return Message
         * @throws TelegramException
         */
        public function editMessageMedia(string $media, array $options=[]): Message
        {
            if(file_exists($media))
            {
                return Message::fromArray(
                    $this->sendFileUpload('editMessageMedia', 'media', $options['media'], $options)
                );
            }

            $tmp_file = new TempFile();
            file_put_contents($tmp_file, $media);

            try
            {
                $response = Message::fromArray(
                    $this->sendFileUpload('editMessageMedia', 'media', $tmp_file, $options)
                );
            }
            catch(TelegramException $e)
            {
                unset($tmp_file);
                throw $e;
            }

            unset($tmp_file);
            return $response;
        }

        /**
         * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline
         * message, the edited Message is returned, otherwise True is returned.
         *
         * @param array $options Optional parameters
         * @return Message
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#editmessagereplymarkup
         * @noinspection PhpUnused
         */
        public function editMessageReplyMarkup(array $options=[]): Message
        {
            return Message::fromArray($this->sendRequest('editMessageReplyMarkup', $options));
        }

        /**
         * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
         *
         * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $message_id Identifier of the original message with the poll
         * @param array $options Optional parameters
         * @return Poll
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#stoppoll
         * @noinspection PhpUnused
         */
        public function stopPoll(int|string $chat_id, int $message_id, array $options=[]): Poll
        {
            return Poll::fromArray($this->sendRequest('stopPoll', array_merge([
                'chat_id' => $chat_id,
                'message_id' => $message_id
            ], $options)));
        }

        /**
         * Use this method to delete a message, including service messages, with the following limitations:
         *  - A message can only be deleted if it was sent less than 48 hours ago.
         *  - Service messages about a supergroup, channel, or forum topic creation can't be deleted.
         *  - A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.
         *  - Bots can delete outgoing messages in private chats, groups, and supergroups.
         *  - Bots can delete incoming messages in private chats.
         *  - Bots granted can_post_messages permissions can delete outgoing messages in channels.
         *  - If the bot is an administrator of a group, it can delete any message there.
         * - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
         * Returns True on success.
         *
         * @param int|string $chat_id Unique identifier for the target chat or username of the target channel (in the format @channelusername)
         * @param int $message_id Identifier of the message to delete
         * @return bool
         * @throws TelegramException
         * @link https://core.telegram.org/bots/api#deletemessage
         * @noinspection PhpUnused
         */
        public function deleteMessage(int|string $chat_id, int $message_id): bool
        {
            $this->sendRequest('deleteMessage', [
                'chat_id' => $chat_id,
                'message_id' => $message_id
            ]);
            return true;
        }
    }