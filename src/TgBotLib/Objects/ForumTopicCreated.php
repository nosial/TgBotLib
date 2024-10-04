<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopicCreated implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $name;

        /**
         * @var int
         */
        private $icon_color;

        /**
         * @var string|null
         */
        private $icon_custom_emoji_id;

        /**   
         * Name of the topic
         *
         * @return string
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * Color of the topic icon in RGB format
         *
         * @return int
         */
        public function getIconColor(): int
        {
            return $this->icon_color;
        }

        /**
         * Optional. Unique identifier of the custom emoji shown as the topic icon
         *
         * @return string|null
         */
        public function getIconCustomEmojiId(): ?string
        {
            return $this->icon_custom_emoji_id;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'name' => $this->name,
                'icon_color' => $this->icon_color,
                'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
            ];
        }

        /**
         * Constructs the object from an array representation.
         *
         * @param array $data
         * @return ForumTopicCreated
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->name = $data['name'] ?? null;
            $object->icon_color = $data['icon_color'] ?? null;
            $object->icon_custom_emoji_id = $data['icon_custom_emoji_id'] ?? null;

            return $object;
        }
    }