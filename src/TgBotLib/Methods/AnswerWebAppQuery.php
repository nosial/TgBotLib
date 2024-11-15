<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\SentWebAppMessage;

    class AnswerWebAppQuery extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): SentWebAppMessage
        {
            if(isset($parameters['result']))
            {
                if($parameters['result'] instanceof ObjectTypeInterface)
                {
                    $parameters['result'] = json_encode($parameters['result']->toArray());
                }

                if(is_array($parameters['result']))
                {
                    $parameters['result'] = json_encode($parameters['result']);
                }
            }

            return SentWebAppMessage::fromArray(self::executeCurl(self::buildPost($bot, Methods::ANSWER_WEB_APP_QUERY->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'web_app_query_id',
                'result'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return null;
        }
    }