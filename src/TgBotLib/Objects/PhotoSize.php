<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class PhotoSize implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private string $width;
        private string $height;
        private ?int $file_size;

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
         * @inheritDoc
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
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?PhotoSize
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->file_id = $data['file_id'] ?? null;
            $object->file_unique_id = $data['file_unique_id'] ?? null;
            $object->width = $data['width'] ?? null;
            $object->height = $data['height'] ?? null;
            $object->file_size = $data['file_size'] ?? null;

            return $object;
        }
    }