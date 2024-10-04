<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InlineKeyboardMarkup implements ObjectTypeInterface
    {
        /**
         * @var InlineKeyboardButton[][]
         */
        private $inline_keyboard;

        /**
         * Array of button rows, each represented by an Array of InlineKeyboardButton objects
         *
         * @see https://core.telegram.org/bots/api#inlinekeyboardmarkup
         * @return InlineKeyboardButton[][]
         */
        public function getInlineKeyboard(): array
        {
            return $this->inline_keyboard;
        }

        /**
         * Adds a row of buttons
         *
         * @param InlineKeyboardButton ...$buttons
         * @return $this
         */
        public function addRow(InlineKeyboardButton ...$buttons): self
        {
            $this->inline_keyboard[] = $buttons;
            return $this;
        }

        /**
         * Removes a row of buttons by index
         *
         * @param int $index
         * @return $this
         */
        public function removeRow(int $index): self
        {
            unset($this->inline_keyboard[$index]);
            return $this;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array[][]
         */
        public function toArray(): array
        {
            $data = [];

            if ($this->inline_keyboard !== null)
            {
                /** @var InlineKeyboardButton $item */
                foreach ($this->inline_keyboard as $item)
                {
                    $data[][] = $item->toArray();
                }
            }

            return $data;
        }

        /**
         * Constructs the object from an array representation
         *
         * @param array|null $data
         * @return InlineKeyboardMarkup|null
         */
        public static function fromArray(?array $data): ?InlineKeyboardMarkup
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->inline_keyboard = [];

            foreach($data as $item)
            {
                $object->inline_keyboard[] = InlineKeyboardButton::fromArray($item);
            }

            return $object;
        }

    }