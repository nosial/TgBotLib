<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class AnswerInlineQuery extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['results']))
            {
                $results = [];
                foreach($parameters['results'] as $result)
                {
                    if($result instanceof ObjectTypeInterface)
                    {
                        $result[] = $result->toArray();
                        continue;
                    }

                    if(is_array($result))
                    {
                        $result[] = $result;
                    }
                }

                $parameters['results'] = json_encode($results);
            }

            if(isset($parameters['button']))
            {
                if($parameters['button'] instanceof ObjectTypeInterface)
                {
                    $parameters['button'] = json_encode($parameters['button']->toArray());
                }

                if(is_array($parameters['button']))
                {
                    $parameters['button'] = json_encode($parameters['button']);
                }
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::ANSWER_INLINE_QUERY->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'inline_query_id',
                'results'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'cache_time',
                'is_personal',
                'next_offset',
                'button'
            ];
        }
    }