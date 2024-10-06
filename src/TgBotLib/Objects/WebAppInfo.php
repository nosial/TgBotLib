<?php

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Classes\Validate;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WebAppInfo implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private string $url;

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
         * An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
         *
         * @param string $url
         * @return $this
         */
        public function setUrl(string $url): self
        {
            if(!Validate::url($url))
            {
                throw new InvalidArgumentException('Invalid url format');
            }

            $this->url = $url;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'url' => $this->url,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?WebAppInfo
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->url = $data['url'];

            return $object;
        }
    }