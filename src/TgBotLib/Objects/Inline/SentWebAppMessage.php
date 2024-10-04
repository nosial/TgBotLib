<?php

    /** @noinspection PhpUnused */
    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Inline;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class SentWebAppMessage implements ObjectTypeInterface
    {
        private ?string $inline_message_id;

        /**
         * @return string|null
         */
        public function getInlineMessageId(): ?string
        {
            return $this->inline_message_id;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'inline_message_id' => $this->inline_message_id,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?SentWebAppMessage
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->inline_message_id = $data['inline_message_id'] ?? null;

            return $object;
        }
    }