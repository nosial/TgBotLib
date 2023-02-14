<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForumTopicEdited implements ObjectTypeInterface
    {
        /**
         * @var string|null
         */
        private $name;

        /**
         * @var string|null
         */
        private $icon_custom_emoji_id;

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
         * Returns array representation of object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'name' => $this->name ?? null,
                'icon_custom_emoji_id' => $this->icon_custom_emoji_id ?? null,
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

            $object->name = $data['name'] ?? null;
            $object->icon_custom_emoji_id = $data['icon_custom_emoji_id'] ?? null;

            return $object;
        }
    }