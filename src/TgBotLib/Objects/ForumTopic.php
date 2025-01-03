<?php


    namespace TgBotLib\Objects;
    
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopic implements ObjectTypeInterface
    {
        private int $message_thread_id;
        private string $name;
        private int $icon_color;
        private ?string $icon_custom_emoji_id;

        /**
         * Unique identifier of the forum topic
         *
         * @return int
         */
        public function getMessageThreadId(): int
        {
            return $this->message_thread_id;
        }

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
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'message_thread_id' => $this->message_thread_id,
                'name' => $this->name,
                'icon_color' => $this->icon_color,
                'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ForumTopic
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->message_thread_id = $data['message_thread_id'] ?? null;
            $object->name = $data['name'] ?? null;
            $object->icon_color = $data['icon_color'] ?? null;
            $object->icon_custom_emoji_id = $data['icon_custom_emoji_id'] ?? null;

            return $object;
        }
    }