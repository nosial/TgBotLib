<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class InlineKeyboardMarkup implements ObjectTypeInterface
    {
        /**
         * @var InlineKeyboardButton[][]
         */
        private array $inline_keyboard;

        /**
         * InlineKeyboardMarkup constructor.
         */
        public function __construct()
        {
            $this->inline_keyboard = [];
        }

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            $keyboard = [];
            foreach ($this->inline_keyboard as $row)
            {
                $buttonRow = [];
                foreach ($row as $button)
                {
                    $buttonRow[] = $button->toArray();
                }

                $keyboard[] = $buttonRow;
            }

            return ['inline_keyboard' => $keyboard];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InlineKeyboardMarkup
        {
            if ($data === null || !isset($data['inline_keyboard']))
            {
                return null;
            }

            $object = new self();

            foreach ($data['inline_keyboard'] as $row)
            {
                $buttons = [];
                foreach ($row as $buttonData)
                {
                    $buttons[] = InlineKeyboardButton::fromArray($buttonData);
                }

                $object->addRow(...$buttons);
            }

            return $object;
        }
    }