<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ForceReply implements ObjectTypeInterface
    {
        /**
         * @var bool
         */
        private $force_reply;

        /**
         * @var string|null
         */
        private $inline_field_placeholder;

        /**
         * @var bool
         */
        private $selective;

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
         * Returns an array representation of the object
         *
         * @return array
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
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->force_reply = $data['force_reply'] ?? false;
            $object->inline_field_placeholder = $data['inline_field_placeholder'] ?? null;
            $object->selective = $data['selective'] ?? false;

            return $object;
        }
    }