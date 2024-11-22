<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;

    class SendInvoice extends Method
    {

        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters = []): Message
        {

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
                'prices',
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