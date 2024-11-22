<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Message;

    class SendInvoice extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): Message
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

            if(isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ObjectTypeInterface)
            {
                $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
            }

            if(isset($parameters['reply_markup']))
            {
                if($parameters['reply_markup'] instanceof ObjectTypeInterface)
                {
                    $parameters['reply_markup'] = json_encode($parameters['reply_markup']->toArray());
                }

                if(is_array($parameters['reply_markup']))
                {
                    $parameters['reply_markup'] = json_encode($parameters['reply_markup']);
                }
            }

            return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_INVOICE->value, $parameters)));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'chat_id',
                'title',
                'description',
                'payload',
                'currency',
                'prices'
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'message_thread_id',
                'provider_token',
                'max_tip_amount',
                'suggested_tip_amounts',
                'start_parameter',
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
                'is_flexible',
                'disable_notification',
                'protect_content',
                'allow_paid_broadcast',
                'message_effect_id',
                'reply_parameters',
                'reply_markup'
            ];
        }
    }