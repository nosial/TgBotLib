<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class File implements ObjectTypeInterface
    {
        private string $file_id;
        private string $file_unique_id;
        private ?int $file_size;
        private ?string $file_path;

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
         * Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have
         * difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a
         * signed 64-bit integer or double-precision float type are safe for storing this value.
         *
         * @return int|null
         */
        public function getFileSize(): ?int
        {
            return $this->file_size;
        }

        /**
         * Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
         *
         * @return string|null
         */
        public function getFilePath(): ?string
        {
            return $this->file_path;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'file_id' => $this->file_id,
                'file_unique_id' => $this->file_unique_id,
                'file_size' => $this->file_size,
                'file_path' => $this->file_path
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?File
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->file_id = $data['file_id'] ?? null;
            $object->file_unique_id = $data['file_unique_id'] ?? null;
            $object->file_size = $data['file_size'] ?? null;
            $object->file_path = $data['file_path'] ?? null;

            return $object;
        }
    }