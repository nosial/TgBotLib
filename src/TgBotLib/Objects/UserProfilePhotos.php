<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class UserProfilePhotos implements ObjectTypeInterface
    {
        private int $total_count;
        private array $photos;

        /**
         * Total number of profile pictures the target user has
         *
         * @return int
         */
        public function getTotalCount(): int
        {
            return $this->total_count;
        }

        /**
         * Requested profile pictures (in up to 4 sizes each)
         *
         * @return PhotoSize[][]
         */
        public function getPhotos(): array
        {
            return $this->photos;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'total_count' => $this->total_count,
                'photos' => array_map(function (array $photo)
                {
                    return array_map(function (PhotoSize $photoSize)
                    {
                        return $photoSize->toArray();
                    }, $photo);
                }, $this->photos),
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?UserProfilePhotos
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->total_count = $data['total_count'];
            $object->photos = array_map(function (array $photo)
            {
                return array_map(function (array $photoSize)
                {
                    return PhotoSize::fromArray($photoSize);
                }, $photo);
            }, $data['photos']);

            return $object;
        }
    }