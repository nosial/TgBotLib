<?php

    namespace TgBotLib\Methods;

    use TgBotLib\Abstracts\Method;
    use TgBotLib\Bot;
    use TgBotLib\Enums\Methods;

    class SetWebhook extends Method
    {
        /**
         * @inheritDoc
         */
        public static function execute(Bot $bot, array $parameters=[]): bool
        {
            // Handle different photo input types
            if (isset($parameters['certificate']))
            {
                $certificate = $parameters['certificate'];

                // If certificate is a file path and exists locally
                if (is_string($certificate) && file_exists($certificate) && is_file($certificate))
                {
                    $curl = self::buildUpload($bot, Methods::SET_WEBHOOK->value, 'certificate', $certificate, array_diff_key($parameters, ['certificate' => null]));
                    return self::executeCurl($curl);
                }
            }

            // If no local files to upload, use regular POST method
            return self::executeCurl(self::buildPost($bot, Methods::SET_WEBHOOK->value, $parameters));
        }

        /**
         * @inheritDoc
         */
        public static function getRequiredParameters(): ?array
        {
            return [
                'url',
            ];
        }

        /**
         * @inheritDoc
         */
        public static function getOptionalParameters(): ?array
        {
            return [
                'certificate',
                'ip_address',
                'max_connections',
                'allowed_updates',
                'drop_pending_updates',
                'secret_token'
            ];
        }
    }