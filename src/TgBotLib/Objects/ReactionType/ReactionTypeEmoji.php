<?php

    namespace TgBotLib\Objects\ReactionType;

    use TgBotLib\Enums\Types\ReactionTypes;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\ReactionType;

    class ReactionTypeEmoji extends ReactionType implements ObjectTypeInterface
    {
        private string $emoji;

        /**
         * Reaction emoji. Currently, it can be one of "👍", "👎", "❤", "🔥", "🥰", "👏", "😁", "🤔", "🤯", "😱",
         * "🤬", "😢", "🎉", "🤩", "🤮", "💩", "🙏", "👌", "🕊", "🤡", "🥱", "🥴", "😍", "🐳", "❤‍🔥", "🌚", "🌭", "💯",
         * "🤣", "⚡", "🍌", "🏆", "💔", "🤨", "😐", "🍓", "🍾", "💋", "🖕", "😈", "😴", "😭", "🤓", "👻", "👨‍💻", "👀",
         * "🎃", "🙈", "😇", "😨", "🤝", "✍", "🤗", "🫡", "🎅", "🎄", "☃", "💅", "🤪", "🗿", "🆒", "💘", "🙉", "🦄",
         * "😘", "💊", "🙊", "😎", "👾", "🤷‍♂", "🤷", "🤷‍♀", "😡"
         *
         * @return string
         */
        public function getEmoji(): string
        {
            return $this->emoji;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'type' => $this->type->value,
                'emoji' => $this->emoji
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
            $object->type = ReactionTypes::EMOJI;
            $object->emoji = $data['emoji'];

            return $object;
        }
    }