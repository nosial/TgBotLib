<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopicCreated implements ObjectTypeInterface
    {
        private string $name;
        private int $icon_color;
        private ?string $icon_custom_emoji_id;

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
         * @inheritDoch
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
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ForumTopicCreated
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->name = $data['name'] ?? null;
            $object->icon_color = $data['icon_color'] ?? null;
            $object->icon_custom_emoji_id = $data['icon_custom_emoji_id'] ?? null;

            return $object;
        }
    }