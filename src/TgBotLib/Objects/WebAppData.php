<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WebAppData implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $data;

        /**
         * @var string
         */
        private $button_text;

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
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'data' => $this->data,
                'button_text' => $this->button_text,
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

            $object->data = @$data['data'] ?: '';
            $object->button_text = @$data['button_text'] ?: '';

            return $object;
        }
    }