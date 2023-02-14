<?php

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WebAppInfo implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $url;

        /**
         * An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
         *
         * @see https://core.telegram.org/bots/webapps#initializing-web-apps
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'url' => $this->url,
            ];
        }

        /**
         * Constructs the object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();
            $object->url = $data['url'];
            return $object;
        }
    }