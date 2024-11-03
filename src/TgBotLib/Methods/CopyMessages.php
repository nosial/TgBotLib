<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\MessageId;

    class CopyMessages extends Method
    {
        /**
         * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages,
         * giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the
         * value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage,
         * but the copied message doesn't have a link to the original message.
         *
         * Returns the MessageId of the sent message on success.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return MessageId[]
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): array
        {
            return array_map(fn($message) => MessageId::fromArray($message),
                self::executeCurl(self::buildPost($bot, Methods::COPY_MESSAGES->value, $parameters))
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
                'protect_content',
                'remove_caption'
            ];
        }
    }