<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InlineQueryResultsButton implements ObjectTypeInterface
    {
        private ?string $text;
        private ?WebAppInfo $webApp;
        private ?string $startParameter;

        /**
         * This object represents a button to be shown above inline query results. You must use exactly one of the optional fields.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data == null)
            {
                $this->text = null;
                $this->webApp = null;
                $this->startParameter = null;
                return;
            }

            $this->text = $data['text'];
            $this->webApp = WebAppInfo::fromArray($data['web_app']);
            $this->startParameter = $data['start_parameter'];
        }

        /**
         * Label text on the button
         *
         * @return string|null
         */
        public function getText(): ?string
        {
            return $this->text;
        }

        /**
         * Label text on the button
         *
         * @param string|null $text
         * @return $this
         */
        public function setText(?string $text): InlineQueryResultsButton
        {
            $this->text = $text;
            return $this;
        }

        /**
         * Optional. Description of the Web App that will be launched when the user presses the button.
         * The Web App will be able to switch back to the inline mode using the method switchInlineQuery inside the Web App.
         *
         * @return WebAppInfo|null
         */
        public function getWebApp(): ?WebAppInfo
        {
            return $this->webApp;
        }

        /**
         * Optional. Description of the Web App that will be launched when the user presses the button.
         * The Web App will be able to switch back to the inline mode using the method switchInlineQuery inside the Web App.
         *
         * @param WebAppInfo|null $webApp
         * @return $this
         */
        public function setWebApp(?WebAppInfo $webApp): InlineQueryResultsButton
        {
            $this->webApp = $webApp;
            return $this;
        }

        /**
         * Optional. Deep-linking parameter for the /start message sent to the bot when a user presses the button.
         * 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.
         *
         * Example: An inline bot that sends YouTube videos can ask the user to connect the bot to their YouTube account
         * to adapt search results accordingly. To do this, it displays a 'Connect your YouTube account' button above
         * the results, or even before showing any. The user presses the button, switches to a private chat with the bot
         * and, in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot
         * can offer a switch_inline button so that the user can easily return to the chat where they wanted to use the
         * bot's inline capabilities.
         *
         * @return string|null
         */
        public function getStartParameter(): ?string
        {
            return $this->startParameter;
        }

        /**
         * Optional. Deep-linking parameter for the /start message sent to the bot when a user presses the button.
         * 1-64 characters, only A-Z, a-z, 0-9, _ and - are allowed.
         *
         * Example: An inline bot that sends YouTube videos can ask the user to connect the bot to their YouTube account
         * to adapt search results accordingly. To do this, it displays a 'Connect your YouTube account' button above
         * the results, or even before showing any. The user presses the button, switches to a private chat with the bot
         * and, in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot
         * can offer a switch_inline button so that the user can easily return to the chat where they wanted to use the
         * bot's inline capabilities.
         *
         * @param string|null $startParameter
         * @return $this
         */
        public function setStartParameter(?string $startParameter): InlineQueryResultsButton
        {
            $this->startParameter = $startParameter;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'text' => $this->text,
                'web_app' => $this->webApp->toArray(),
                'start_parameter' => $this->startParameter
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineQueryResultsButton
        {
            return new self($data);
        }
    }