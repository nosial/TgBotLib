<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Exceptions\TelegramException;
    use TgBotLib\Objects\Message;
    use TgBotLib\Objects\ReplyParameters;

    class SendPoll extends Method
    {
        /**
         * Use this method to send a native poll. On success, the sent Message is returned.
         *
         * @param Bot $bot
         * @param array $parameters
         * @return Message
         * @throws TelegramException
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {
            // Handle reply parameters
            if (isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            // Handle reply markup
            if (isset($parameters['reply_markup']) && method_exists($parameters['reply_markup'], 'toArray'))
            {
                $parameters['reply_markup'] = $parameters['reply_markup']->toArray();
            }

            // Handle question entities
            if (isset($parameters['question_entities']) && is_array($parameters['question_entities']))
            {
                $parameters['question_entities'] = json_encode(array_map(function ($entity) {return $entity->toArray();}, $parameters['question_entities']));
            }

            // Handle explanation entities
            if (isset($parameters['explanation_entities']) && is_array($parameters['explanation_entities']))
            {
                $parameters['explanation_entities'] = json_encode(array_map(function ($entity) {return $entity->toArray();}, $parameters['explanation_entities']));
            }

            if (isset($parameters['options']) && is_array($parameters['options']))
            {
                $parameters['options'] = json_encode(array_map(function ($option) {return $option->toArray();}, $parameters['options']));
            }

            // Make request
            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_POLL->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'question',
                'options',
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'business_connection_id',
                'message_thread_id',
                'question_parse_mode',
                'question_entities',
                'is_anonymous',
                'type',
                'allows_multiple_answers',
                'correct_option_id',
                'explanation',
                'explanation_parse_mode',
                'explanation_entities',
                'open_period',
                'close_date',
                'is_closed',
                'disable_notification',
                'protect_content',
                'message_effect_id',
                'reply_parameters',
                'reply_markup',
            ];
        }
    }
