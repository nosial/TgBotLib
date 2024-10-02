<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SentWebAppMessage implements ObjectTypeInterface
    {
        /**
         * @var string|null
         */
        private $inline_message_id;

        /**
         * @return string|null
         */
        public function getInlineMessageId(): ?string
        {
            return $this->inline_message_id;
        }

        /**
         * Returns an array representation of the object
         *
         * @return null[]|string[]
         */
        public function toArray(): array
        {
            return [
                'inline_message_id' => $this->inline_message_id,
            ];
        }

        /**
         * Constructs object from an array representation
         *
         * @param array $data
         * @return SentWebAppMessage
         */
        public static function fromArray(array $data): SentWebAppMessage
        {
            $object = new self();

            $object->inline_message_id = $data['inline_message_id'] ?? null;

            return $object;
        }
    }