<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopicEdited implements ObjectTypeInterface
    {
        private ?string $name;
        private ?string $icon_custom_emoji_id;

        /**
         * Optional. New name of the topic, if it was edited
         *
         * @return string|null
         */
        public function getName(): ?string
        {
            return $this->name;
        }

        /**
         * Optional. New identifier of the custom emoji shown as the topic icon, if it was edited;
         * an empty string if the icon was removed
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
                'name' => $this->name ?? null,
                'icon_custom_emoji_id' => $this->icon_custom_emoji_id ?? null,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ForumTopicEdited
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->name = $data['name'] ?? null;
            $object->icon_custom_emoji_id = $data['icon_custom_emoji_id'] ?? null;

            return $object;
        }
    }