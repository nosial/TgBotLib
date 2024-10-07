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
         * ReplyKeyboardMarkup constructor.
         */
        public function __construct()
        {
            $this->keyboard = [];
            $this->is_persistent = false;
            $this->resize_keyboard = false;
            $this->one_time_keyboard = false;
            $this->input_field_placeholder = null;
            $this->selective = false;
        }

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
         * Adds a new row of KeyboardButton objects to the keyboard.
         *
         * @param KeyboardButton ...$buttons The buttons to add as a new row.
         * @return ReplyKeyboardMarkup
         */
        public function addRow(KeyboardButton ...$buttons): ReplyKeyboardMarkup
        {
            $this->keyboard[] = $buttons;
            return $this;
        }

        /**
         * Adds multiple rows to the existing structure, where each row is an array.
         *
         * @param array $rows Array of rows, each row being an array of elements to add.
         *
         * @return ReplyKeyboardMarkup
         */
        public function addRows(array $rows): ReplyKeyboardMarkup
        {
            foreach($rows as $row)
            {
                $this->addRow(...$row);
            }

            return $this;
        }

        /**
         * Removes a row from the keyboard at the specified index.
         *
         * @param int $index The index of the row to remove.
         * @return ReplyKeyboardMarkup
         */
        public function removeRow(int $index): ReplyKeyboardMarkup
        {
            unset($this->keyboard[$index]);
            return $this;
        }

        /**
         * Removes rows from the collection based on the given indexes.
         *
         * @param int ...$indexes The indexes of the rows to be removed.
         *
         * @return ReplyKeyboardMarkup
         */
        public function removeRows(int ...$indexes): ReplyKeyboardMarkup
        {
            foreach($indexes as $index)
            {
                $this->removeRow($index);
            }

            return $this;
        }

        /**
         * Clears all rows in the keyboard by setting it to an empty array.
         *
         * @return ReplyKeyboardMarkup
         */
        public function clearRows(): ReplyKeyboardMarkup
        {
            $this->keyboard = [];
            return $this;
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
         * Sets the persistence state for the keyboard markup.
         *
         * @param bool $is_persistent Whether the keyboard should be persistent.
         * @return ReplyKeyboardMarkup
         */
        public function setPersistent(bool $is_persistent): ReplyKeyboardMarkup
        {
            $this->is_persistent = $is_persistent;
            return $this;
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
         * Sets the resize_keyboard property for the reply markup.
         *
         * @param bool $resize_keyboard Specify whether the keyboard should resize to fit the text content.
         * @return ReplyKeyboardMarkup The current instance with updated resize_keyboard property.
         */
        public function setResizeKeyboard(bool $resize_keyboard): ReplyKeyboardMarkup
        {
            $this->resize_keyboard = $resize_keyboard;
            return $this;
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
         * Sets the keyboard to be one-time use, meaning it will hide itself
         * after a button is pressed.
         *
         * @param bool $one_time_keyboard Whether the keyboard should be one-time use
         * @return ReplyKeyboardMarkup This instance for method chaining
         */
        public function setOneTimeKeyboard(bool $one_time_keyboard): ReplyKeyboardMarkup
        {
            $this->one_time_keyboard = $one_time_keyboard;
            return $this;
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
         * Sets the placeholder text for the input field
         *
         * @param string $input_field_placeholder The placeholder text to be displayed in the input field
         * @return ReplyKeyboardMarkup
         */
        public function setInputFieldPlaceholder(string $input_field_placeholder): ReplyKeyboardMarkup
        {
            $this->input_field_placeholder = $input_field_placeholder;
            return $this;
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
         * Sets whether to show the keyboard to specific users only.
         *
         * @param bool $selective Indicate whether the keyboard is selective
         * @return ReplyKeyboardMarkup Instance of the current ReplyKeyboardMarkup for method chaining
         */
        public function setSelective(bool $selective): ReplyKeyboardMarkup
        {
            $this->selective = $selective;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            $array = [
                'keyboard' => $this->keyboard,
                'is_persistent' => $this->is_persistent,
                'resize_keyboard' => $this->resize_keyboard,
                'one_time_keyboard' => $this->one_time_keyboard,
                'selective' => $this->selective
            ];

            if($this->input_field_placeholder !== null)
            {
                $array['input_field_placeholder'] = $this->input_field_placeholder;
            }

            return $array;
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
            $object->is_persistent = $data['is_persistent'] ?? false;
            $object->resize_keyboard = $data['resize_keyboard'] ?? false;
            $object->one_time_keyboard = $data['one_time_keyboard'] ?? false;
            $object->input_field_placeholder = $data['input_field_placeholder'] ?? null;
            $object->selective = $data['selective'] ?? false;

            return $object;
        }
    }