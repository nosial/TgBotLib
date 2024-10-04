<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class Audio implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private int $duration;
        private ?string $performer;
        private ?string $title;
        private ?string $file_name;
        private ?string $mime_type;
        private ?int $file_size;
        private ?PhotoSize $thumbnail;

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
         * Duration of the audio in seconds as defined by sender
         *
         * @return int
         */
        public function getDuration(): int
        {
            return $this->duration;
        }

        /**
         * Optional. Performer of the audio as defined by sender or by audio tags
         *
         * @return string|null
         */
        public function getPerformer(): ?string
        {
            return $this->performer;
        }

        /**
         * Optional. Title of the audio as defined by sender or by audio tags
         *
         * @return string|null
         */
        public function getTitle(): ?string
        {
            return $this->title;
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
         * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit
         * integer or double-precision float type are safe for storing this value.
         *
         * @return int|null
         */
        public function getFileSize(): ?int
        {
            return $this->file_size;
        }

        /**
         * Optional. Thumbnail of the album cover to which the music file belongs
         *
         * @return PhotoSize|null
         */
        public function getThumbnail(): ?PhotoSize
        {
            return $this->thumbnail;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'file_id' => $this->file_id ?? null,
                'file_unique_id' => $this->file_unique_id ?? null,
                'duration' => $this->duration ?? null,
                'performer' => $this->performer ?? null,
                'title' => $this->title ?? null,
                'file_name' => $this->file_name ?? null,
                'mime_type' => $this->mime_type ?? null,
                'file_size' => $this->file_size ?? null,
                'thumbnail' => is_null($this->thumbnail) ? null : $this->thumbnail->toArray()
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Audio
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->file_id = $data['file_id'] ?? null;
            $object->file_unique_id = $data['file_unique_id'] ?? null;
            $object->duration = $data['duration'] ?? null;
            $object->performer = $data['performer'] ?? null;
            $object->title = $data['title'] ?? null;
            $object->file_name = $data['file_name'] ?? null;
            $object->mime_type = $data['mime_type'] ?? null;
            $object->file_size = $data['file_size'] ?? null;
            $object->thumbnail = isset($data['thumbnail']) ? PhotoSize::fromArray($data['thumbnail']) : null;

            return $object;
        }
    }