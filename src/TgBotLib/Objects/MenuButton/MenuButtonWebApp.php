<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\MenuButton;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MenuButton;
    use TgBotLib\Objects\WebAppInfo;

    class MenuButtonWebApp implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $type;

        /**
         * @var string
         */
        private $text;

        /**
         * @var WebAppInfo
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
         * @return string
         */
        public function getText(): string
        {
            return $this->text;
        }

        /**
         * Description of the Web App that will be launched when the user presses the button. The Web App will be able
         * to send an arbitrary message on behalf of the user using the method answerWebAppQuery.
         *
         * @see https://core.telegram.org/bots/api#answerwebappquery
         * @return WebAppInfo
         */
        public function getWebApp(): WebAppInfo
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
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->type = $data['type'] ?? null;
            $object->text = $data['text'] ?? null;
            $object->web_app = isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app']) : null;

            return $object;
        }

        /**
         * Constructs object from MenuButton
         *
         * @param MenuButton $menuButton
         * @return MenuButtonWebApp
         */
        public static function fromMenuButton(MenuButton $menuButton): MenuButtonWebApp
        {
            $object = new self();

            $object->type = $menuButton->getType();
            $object->text = $menuButton->getText();
            $object->web_app = $menuButton->getWebApp();

            return $object;
        }

    }