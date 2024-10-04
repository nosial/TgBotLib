<?php

    namespace TgBotLib\Objects\ReactionType;

    use TgBotLib\Enums\Types\ReactionTypes;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ReactionType;

    class ReactionTypeCustomEmoji extends ReactionType implements ObjectTypeInterface
    {
        private string $custom_emoji_id;

        /**
         * Custom emoji identifier
         *
         * @return string
         */
        public function getCustomEmojiId(): string
        {
            return $this->custom_emoji_id;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
                'custom_emoji_id' => $this->custom_emoji_id
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ReactionType
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = ReactionTypes::CUSTOM_EMOJI;
            $object->custom_emoji_id = $data['custom_emoji_id'];

            return $object;
        }
    }