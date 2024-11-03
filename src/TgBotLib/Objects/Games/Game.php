<?php


    namespace TgBotLib\Objects\Games;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Animation;
    use TgBotLib\Objects\MessageEntity;
    use TgBotLib\Objects\PhotoSize;

    class Game implements ObjectTypeInterface
    {
        private string $title;
        private string $description;
        /**
         * @var PhotoSize[]
         */
        private array $photo;
        private ?string $text;
        /**
         * @var MessageEntity[]|null
         */
        private ?array $text_entities;
        private ?Animation $animation;

        /**
         * Title of the game
         *
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * Description of the game
         *
         * @return string
         */
        public function getDescription(): string
        {
            return $this->description;
        }

        /**
         * Photo that will be displayed in the game message in chats.
         *
         * @return PhotoSize[]
         */
        public function getPhoto(): array
        {
            return $this->photo;
        }

        /**
         * Optional. Brief description of the game or high scores included in the game message. Can be automatically
         * edited to include current high scores for the game when the bot calls setGameScore, or manually edited using
         * editMessageText. 0-4096 characters.
         *
         * @see https://core.telegram.org/bots/api#setgamescore
         * @see https://core.telegram.org/bots/api#editmessagetext
         * @return string|null
         */
        public function getText(): ?string
        {
            return $this->text;
        }

        /**
         * Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
         *
         * @return MessageEntity[]|null
         */
        public function getTextEntities(): ?array
        {
            return $this->text_entities;
        }

        /**
         * Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
         *
         * @see https://t.me/botfather
         * @return Animation|null
         */
        public function getAnimation(): ?Animation
        {
            return $this->animation;
        }

        /**
         * @inheritDocll
         */
        public function toArray(): array
        {
            return [
                'title' => $this->title,
                'description' => $this->description,
                'photo' => isset($this->photo) ? array_map(fn(PhotoSize $item) => $item->toArray(), $this->photo) : null,
                'text' => $this->text,
                'text_entities' => isset($this->text_entities) ? array_map(fn(MessageEntity $item) => $item->toArray(), $this->text_entities) : null,
                'animation' => $this->animation?->toArray(),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Game
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->description = $data['description'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->photo = isset($data['photo']) ? array_map(fn(array $items) => PhotoSize::fromArray($items), $data['photo']) : null;
            $object->text = $data['text'] ?? null;
            $object->text_entities = ($data['text_entities']) ? array_map(fn(array $items) => MessageEntity::fromArray($items), $data['text_entities']) : null;
            $object->animation = isset($data['animation']) ? Animation::fromArray($data['animation']) : null;

            return $object;
        }
    }