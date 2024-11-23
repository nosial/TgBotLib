<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class AnswerShippingQuery extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['shipping_options']))
            {
                if($parameters['shipping_options'] instanceof ObjectTypeInterface)
                {
                    $parameters['shipping_options'] = json_encode($parameters['shipping_options']->toArray());
                }
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::ANSWER_SHIPPING_QUERY->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'shipping_query_id',
                'ok'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'shipping_options',
                'error_message'
            ];
        }
    }