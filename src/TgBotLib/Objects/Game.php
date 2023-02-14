<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Game implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $title;

        /**
         * @var string
         */
        private $description;

        /**
         * @var PhotoSize[]
         */
        private $photo;

        /**
         * @var string|null
         */
        private $text;
        /**
         * @var MessageEntity[]|null
         */
        private $text_entities;

        /**
         * @var Animation|null
         */
        private $animation;

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
         * Returns an array representation of this object.
         *
         * @return array
         */
        public function toArray(): array
        {
            $text_entities = null;
            if ($this->text_entities)
            {
                foreach ($this->text_entities as $text_entity)
                {
                    $text_entities[] = $text_entity->toArray();
                }
            }

            $photo = null;
            if ($this->photo)
            {
                foreach ($this->photo as $photo_item)
                {
                    $photo[] = $photo_item->toArray();
                }
            }

            return [
                'title' => $this->title,
                'description' => $this->description,
                'photo' => $photo,
                'text' => $this->text,
                'text_entities' => $text_entities,
                'animation' => ($this->animation instanceof Animation) ? $this->animation->toArray() : null,
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

            $photo = null;
            if ($data['photo'])
            {
                foreach ($data['photo'] as $photo_item)
                {
                    $photo[] = PhotoSize::fromArray($photo_item);
                }
            }
            $text_entities = null;
            if ($data['text_entities'])
            {
                foreach ($data['text_entities'] as $text_entity)
                {
                    $text_entities[] = MessageEntity::fromArray($text_entity);
                }
            }

            $object->description = $data['description'];
            $object->title = $data['title'];
            $object->photo = $photo;
            $object->text = $data['text'] ?? null;
            $object->text_entities = $text_entities;
            $object->animation = ($data['animation']) ? Animation::fromArray($data['animation']) : null;

            return $object;
        }
    }