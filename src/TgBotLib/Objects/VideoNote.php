<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class VideoNote implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private int $length;
        private int $duration;
        private ?PhotoSize $thumbnail;
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
         * Unique identifier for this file, which is supposed to be the same over time
         * and for different bots. Can't be used to download or reuse the file.
         *
         * @return string
         */
        public function getFileUniqueId(): string
        {
            return $this->file_unique_id;
        }

        /**
         * Video width and height (diameter of the video message) as defined by sender
         *
         * @return int
         */
        public function getLength(): int
        {
            return $this->length;
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
                'length' => $this->length,
                'duration' => $this->duration,
                'thumbnail' => $this->thumbnail?->toArray(),
                'file_size' => $this->file_size,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?VideoNote
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->file_id = $data['file_id'];
            $object->file_unique_id = $data['file_unique_id'];
            $object->length = $data['length'];
            $object->duration = $data['duration'];
            $object->thumbnail = isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null;
            $object->file_size = $data['file_size'];

            return $object;
        }
    }