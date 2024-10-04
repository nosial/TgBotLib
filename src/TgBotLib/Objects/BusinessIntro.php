<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class BusinessIntro implements ObjectTypeInterface
    {
        private ?string $title;
        private ?string $message;
        private ?Sticker $sticker;

        /**
         * Optional. Title text of the business intro
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
        }

        /**
         * Optional. Message text of the business intro
         *
         * @return string|null
         */
        public function getMessage(): ?string
        {
            return $this->message;
        }

        /**
         * Optional. Sticker of the business intro
         *
         * @return Sticker|null
         */
        public function getSticker(): ?Sticker
        {
            return $this->sticker;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'title' => $this->title,
                'message' => $this->message,
                'sticker' => $this->sticker?->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ObjectTypeInterface
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->title = $data['title'] ?? null;
            $object->message = $data['message'] ?? null;
            $object->sticker = Sticker::fromArray($data['sticker']) ?? null;

            return $object;
        }
    }