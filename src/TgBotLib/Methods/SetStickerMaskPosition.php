<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SetStickerMaskPosition extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): true
        {
            if(isset($parameters['mask_position']))
            {
                if($parameters['mask_position'] instanceof ObjectTypeInterface)
                {
                    $parameters['mask_position'] = json_encode($parameters['mask_position']->toArray());
                }

                if(is_array($parameters['mask_position']))
                {
                    $parameters['mask_position'] = json_encode($parameters['mask_position']);
                }
            }

            return (bool)self::executeCurl(self::buildPost($bot, Methods::SET_STICKER_MASK_POSITION->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'sticker'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'mask_position'
            ];
        }
    }