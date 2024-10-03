<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline\InlineQueryResult;

    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Inline\InlineKeyboardMarkup;
    use TgBotLib\Objects\Inline\InlineQueryResult;

    class InlineQueryResultGame extends InlineQueryResult implements ObjectTypeInterface
    {
        private string $game_short_name;
        private ?InlineKeyboardMarkup $reply_markup;

        /**
         * Sets the value of the 'id' field
         * Unique identifier for this result, 1-64 bytes
         *
         * @param string $id
         * @return InlineQueryResultGame
         */
        public function setId(string $id): InlineQueryResultGame
        {
            $this->id = $id;
            return $this;
        }

        /**
         * Short name of the game
         *
         * @return string
         */
        public function getGameShortName(): string
        {
            return $this->game_short_name;
        }

        /**
         * Sets the value of the 'game_short_name' field
         * Short name of the game
         *
         * @param string $game_short_name
         * @return InlineQueryResultGame
         */
        public function setGameShortName(string $game_short_name): InlineQueryResultGame
        {
            $this->game_short_name = $game_short_name;
            return $this;
        }

        /**
         * Optional. Inline keyboard attached to the message
         *
         * @return InlineKeyboardMarkup|null
         */
        public function getReplyMarkup(): ?InlineKeyboardMarkup
        {
            return $this->reply_markup;
        }

        /**
         * Optional. Inline keyboard attached to the message
         *
         * @param InlineKeyboardMarkup|null $reply_markup
         * @return InlineQueryResultGame
         */
        public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): InlineQueryResultGame
        {
            $this->reply_markup = $reply_markup;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value,
                'id' => $this->id,
                'game_short_name' => $this->game_short_name,
                'reply_markup' => $this->reply_markup?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(array $data): InlineQueryResultGame
        {
            $object = new self();
            $object->type = InlineQueryResultType::GAME;
            $object->id = $data['id'] ?? null;
            $object->game_short_name = $data['game_short_name'] ?? null;
            $object->reply_markup = isset($data['reply_markup']) ? InlineKeyboardMarkup::fromArray($data['reply_markup']) : null;

            return $object;
        }
    }