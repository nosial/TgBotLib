<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ReplyKeyboardMarkup implements ObjectTypeInterface
    {
        /**
         * @var KeyboardButton[][]
         */
        private array $keyboard;
        private bool $is_persistent;
        private bool $resize_keyboard;
        private bool $one_time_keyboard;
        private ?string $input_field_placeholder;
        private bool $selective;

        /**
         * Array of button rows, each represented by an Array of KeyboardButton objects
         *
         * @return KeyboardButton[][]
         */
        public function getKeyboard(): array
        {
            return $this->keyboard;
        }

        /**
         * Optional. Requests clients to always show the keyboard when the regular keyboard is hidden. Defaults to
         * false, in which case the custom keyboard can be hidden and opened with a keyboard icon.
         *
         * @return bool
         */
        public function isPersistent(): bool
        {
            return $this->is_persistent;
        }

        /**
         * Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller
         * if there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the
         * same height as the app's standard keyboard.
         *
         * @return bool
         */
        public function isResizeKeyboard(): bool
        {
            return $this->resize_keyboard;
        }

        /**
         * Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be
         * available, but clients will automatically display the usual letter-keyboard in the chat - the user can
         * press a special button in the input field to see the custom keyboard again. Defaults to false.
         *
         * @return bool
         */
        public function isOneTimeKeyboard(): bool
        {
            return $this->one_time_keyboard;
        }

        /**
         * Optional. The placeholder to be shown in the input field when the keyboard is active; 1-64 characters
         *
         * @return string|null
         */
        public function getInputFieldPlaceholder(): ?string
        {
            return $this->input_field_placeholder;
        }

        /**
         * Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users
         * that are @mentioned in the text of the Message object; 2) if the bot's message is a reply
         * (has reply_to_message_id), sender of the original message.
         *
         * Example: A user requests to change the bot's language, bot replies to the request with a keyboard to select
         * the new language. Other users in the group don't see the keyboard.
         *
         * @return bool
         */
        public function isSelective(): bool
        {
            return $this->selective;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'keyboard' => $this->keyboard,
                'is_persistent' => $this->is_persistent,
                'resize_keyboard' => $this->resize_keyboard,
                'one_time_keyboard' => $this->one_time_keyboard,
                'input_field_placeholder' => $this->input_field_placeholder,
                'selective' => $this->selective,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ReplyKeyboardMarkup
        {
            $object = new self();

            $object->keyboard = [];
            foreach($data['keyboard'] as $keyboard)
            {
                $object->keyboard[] = KeyboardButton::fromArray($keyboard);
            }
            $object->is_persistent = $data['is_persistent'] ?? null;
            $object->resize_keyboard = $data['resize_keyboard'] ?? null;
            $object->one_time_keyboard = $data['one_time_keyboard'] ?? null;
            $object->input_field_placeholder = $data['input_field_placeholder'] ?? null;
            $object->selective = $data['selective'] ?? null;

            return $object;
        }
    }