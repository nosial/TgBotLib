<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SetPassportDataErrors extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($data['errors']))
            {
                $errors = [];
                foreach($data['errors'] as $error)
                {
                    if($error instanceof ObjectTypeInterface)
                    {
                        $errors[] = $error->toArray();
                    }

                    if(is_array($error))
                    {
                        $errors[] = $error;
                    }
                }

                $parameters['errors'] = json_encode($errors);
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_PASSPORT_DATA_ERRORS->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'user_id',
                'errors'
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