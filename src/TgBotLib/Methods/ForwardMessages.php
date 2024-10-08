<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\MessageId;

    class ForwardMessages extends Method
    {
        /**
         * Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or
         * forwarded, they are skipped. Service messages and messages with protected content can't be forwarded.
         * Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return MessageId[]
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            return array_map(fn($messageId) => MessageId::fromArray($messageId),
                self::executeCurl(self::buildPost($bot, Methods::FORWARD_MESSAGES->value, $parameters))
            );
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'from_chat_id',
                'message_ids'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'message_thread_id',
                'disable_notification',
                'protect_content'
            ];
        }
    }