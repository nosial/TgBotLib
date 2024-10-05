<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForceReply implements ObjectTypeInterface
    {
        private bool $force_reply;
        private ?string $inline_field_placeholder;
        private bool $selective;

        /**
         * Shows reply interface to the user, as if they manually selected the bot's message and tapped 'Reply'
         *
         * @return bool
         */
        public function isForceReply(): bool
        {
            return $this->force_reply;
        }

        /**
         * Optional. The placeholder to be shown in the input field when the reply is active; 1-64 characters
         *
         * @return string|null
         */
        public function getInlineFieldPlaceholder(): ?string
        {
            return $this->inline_field_placeholder;
        }

        /**
         * Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are
         * @mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id),
         * sender of the original message.
         *
         * @return bool
         */
        public function isSelective(): bool
        {
            return $this->selective;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'force_reply' => $this->force_reply,
                'inline_field_placeholder' => $this->inline_field_placeholder,
                'selective' => $this->selective,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ForceReply
        {
            $object = new self();

            $object->force_reply = $data['force_reply'] ?? false;
            $object->inline_field_placeholder = $data['inline_field_placeholder'] ?? null;
            $object->selective = $data['selective'] ?? false;

            return $object;
        }
    }