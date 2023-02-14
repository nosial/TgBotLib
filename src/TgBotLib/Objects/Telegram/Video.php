<?php

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Video implements ObjectTypeInterface
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
         * @var int
         */
        private $width;

        /**
         * @var int
         */
        private $height;

        /**
         * @var int
         */
        private $duration;

        /**
         * @var PhotoSize|null
         */
        private $thumb;

        /**
         * @var string|null
         */
        private $file_name;

        /**
         * @var string|null
         */
        private $mime_type;

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
        public function getThumb(): ?PhotoSize
        {
            return $this->thumb;
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
         * Returns an array representation of the object.
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
                'duration' => $this->duration,
                'thumb' => ($this->thumb instanceof ObjectTypeInterface) ? $this->thumb->toArray() : null,
                'file_name' => $this->file_name ?? null,
                'mime_type' => $this->mime_type ?? null,
                'file_size' => $this->file_size ?? null,
            ];
        }

        /**
         * Constructs the object from an array representation.
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            $object = new self();

            $object->file_id = $data['file_id'];
            $object->file_unique_id = $data['file_unique_id'];
            $object->width = $data['width'];
            $object->height = $data['height'];
            $object->duration = $data['duration'];
            $object->thumb = (isset($data['thumb'])) ? PhotoSize::fromArray($data['thumb']) : null;
            $object->file_name = $data['file_name'] ?? null;
            $object->mime_type = $data['mime_type'] ?? null;
            $object->file_size = $data['file_size'] ?? null;

            return $object;
        }
    }