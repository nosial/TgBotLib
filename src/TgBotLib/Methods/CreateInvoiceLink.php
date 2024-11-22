<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class CreateInvoiceLink extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): string
        {
            if(isset($parameters['prices']))
            {
                $prices = [];
                foreach($parameters['prices'] as $price)
                {
                    if($price instanceof ObjectTypeInterface)
                    {
                        $prices[] = $price->toArray();
                    }

                    if(is_array($price))
                    {
                        $prices[] = $price;
                    }
                }

                $parameters['prices'] = json_encode($parameters);
            }


            if(isset($parameters['suggested_tip_amounts']) && is_array($parameters['suggested_tip_amounts']))
            {
                $parameters['suggested_tip_amounts'] = json_encode($parameters['suggested_tip_amounts']);
            }

            if(isset($parameters['provider_data']) && is_array($parameters['provider_data']))
            {
                $parameters['provider_data'] = json_encode($parameters['provider_data']);
            }

            return (string)self::executeCurl(self::buildPost($bot, Methods::CREATE_INVOICE_LINK->value, $parameters));

        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'title',
                'description',
                'payload',
                'currency',
                'prices',
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'business_connection_id',
                'provider_token',
                'subscription_period',
                'max_tip_amount',
                'suggested_tip_amounts',
                'provider_data',
                'photo_url',
                'photo_size',
                'photo_width',
                'photo_height',
                'need_name',
                'need_phone_number',
                'need_email',
                'need_shipping_address',
                'send_phone_number_to_provider',
                'send_email_to_provider',
                'is_flexible'
            ];
        }
    }