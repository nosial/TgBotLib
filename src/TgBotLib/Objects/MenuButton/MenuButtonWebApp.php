<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\MenuButton;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\MenuButton;
    use TgBotLib\Objects\WebAppInfo;

    class MenuButtonWebApp extends MenuButton implements ObjectTypeInterface
    {
        private string $text;
        private WebAppInfo $web_app;

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'text' => $this->text,
                'web_app' => $this->web_app?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): MenuButtonWebApp
        {
            $object = new self();
            $object->type = $data['type'] ?? null;
            $object->text = $data['text'] ?? null;
            $object->web_app = isset($data['web_app']) ? WebAppInfo::fromArray($data['web_app'] ?? []) : null;

            return $object;
        }

    }