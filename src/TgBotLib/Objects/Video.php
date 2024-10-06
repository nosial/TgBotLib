<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Video implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private int $width;
        private int $height;
        private int $duration;
        private ?PhotoSize $thumbnail;
        private ?string $file_name;
        private ?string $mime_type;
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
         * Video width as defined by sender
         *
         * @return int
         */
        public function getWidth(): int
        {
            return $this->width;
        }

        /**
         * Video height as defined by sender
         *
         * @return int
         */
        public function getHeight(): int
        {
            return $this->height;
        }

        /**
         * Duration of the video in seconds as defined by sender
         *
         * @return int
         */
        public function getDuration(): int
        {
            return $this->duration;
        }

        /**
         * Optional. Video thumbnail
         *
         * @return PhotoSize|null
         */
        public function getThumbnail(): ?PhotoSize
        {
            return $this->thumbnail;
        }

        /**
         * Optional. Original filename as defined by sender
         *
         * @return string|null
         */
        public function getFileName(): ?string
        {
            return $this->file_name;
        }

        /**
         * Optional. MIME type of the file as defined by sender
         *
         * @return string|null
         */
        public function getMimeType(): ?string
        {
            return $this->mime_type;
        }

        /**
         * Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
         * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed
         * 64-bit integer or double-precision float type are safe for storing this value.
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
                'duration' => $this->duration,
                'thumbnail' => $this->thumbnail?->toArray(),
                'file_name' => $this->file_name ?? null,
                'mime_type' => $this->mime_type ?? null,
                'file_size' => $this->file_size ?? null,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Video
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->file_id = $data['file_id'];
            $object->file_unique_id = $data['file_unique_id'];
            $object->width = $data['width'];
            $object->height = $data['height'];
            $object->duration = $data['duration'];
            $object->thumbnail = isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null;
            $object->file_name = $data['file_name'] ?? null;
            $object->mime_type = $data['mime_type'] ?? null;
            $object->file_size = $data['file_size'] ?? null;

            return $object;
        }
    }