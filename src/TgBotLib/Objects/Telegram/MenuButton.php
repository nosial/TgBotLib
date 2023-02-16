<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MenuButton implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var string|null
         */
        private $text;

        /**
         * @var WebAppInfo|null
         */
        private $web_app;

        /**
         * Type of the button, must be web_app
         *
         * @return string
         */
        public function getType(): string
        {
            return $this->type;
        }

        /**
         * Text on the button
         *
         * @return string|null
         */
        public function getText(): ?string
        {
            return $this->text;
        }

        /**
         * Description of the Web App that will be launched when the user presses the button. The Web App will be able
         * to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
         *
         * @return WebAppInfo|null
         */
        public function getWebApp(): ?WebAppInfo
        {
            return $this->web_app;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
                'text' => $this->text,
                'web_app' => ($this->web_app instanceof ObjectTypeInterface) ? $this->web_app->toArray() : null
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return MenuButton
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->type = $data['type'] ?? null;
            $object->text = $data['text'] ?? null;
            $object->web_app = ($data['web_app'] ?? null) ? WebAppInfo::fromArray($data['web_app']) : null;

            return $object;
        }
    }