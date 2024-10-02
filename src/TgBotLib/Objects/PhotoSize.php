<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PhotoSize implements ObjectTypeInterface
    {
        /**
         * @var string
         */
        private $file_id;

        /**
         * @var string
         */
        private $file_unique_id;

        /**
         * @var string
         */
        private $width;

        /**
         * @var string
         */
        private $height;

        /**
         * @var int|null
         */
        private $file_size;

        /**
         * Identifier for this file, which can be used to download or reuse the file
         *
         * @return string
         */
        public function getFileId(): string
        {
            return $this->file_id;
        }

        /**
         *
         * Unique identifier for this file, which is supposed to be the same over time and for different bots.
         * Can't be used to download or reuse the file.
         *
         * @return string
         */
        public function getFileUniqueId(): string
        {
            return $this->file_unique_id;
        }

        /**
         * Photo width
         *
         * @return string
         */
        public function getWidth(): string
        {
            return $this->width;
        }

        /**
         * Photo height
         *
         * @return string
         */
        public function getHeight(): string
        {
            return $this->height;
        }

        /**
         * Optional. File size in bytes
         *
         * @return int|null
         */
        public function getFileSize(): ?int
        {
            return $this->file_size;
        }

        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'file_id' => $this->file_id,
                'file_unique_id' => $this->file_unique_id,
                'width' => $this->width,
                'height' => $this->height,
                'file_size' => $this->file_size,
            ];
        }

        /**
         * Constructs an object from an array representation
         *
         * @param array $data
         * @return PhotoSize
         * @noinspection DuplicatedCode
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->file_id = $data['file_id'] ?? null;
            $object->file_unique_id = $data['file_unique_id'] ?? null;
            $object->width = $data['width'] ?? null;
            $object->height = $data['height'] ?? null;
            $object->file_size = $data['file_size'] ?? null;

            return $object;
        }
    }