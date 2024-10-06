<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WebAppData implements ObjectTypeInterface
    {
        private string $data;
        private string $button_text;

        /**
         * The data. Be aware that a bad client can send arbitrary data in this field.
         *
         * @return string
         */
        public function getData(): string
        {
            return $this->data;
        }

        /**
         * Text of the web_app keyboard button from which the Web App was opened.
         * Be aware that a bad client can send arbitrary data in this field.
         *
         * @return string
         */
        public function getButtonText(): string
        {
            return $this->button_text;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'data' => $this->data,
                'button_text' => $this->button_text,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?WebAppData
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->data = $data['data'] ?: '';
            $object->button_text = $data['button_text'] ?: '';

            return $object;
        }
    }