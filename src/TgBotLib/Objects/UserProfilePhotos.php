<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class UserProfilePhotos implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $total_count;

        /**
         * @var PhotoSize[][]
         */
        private $photos;

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
         * Returns an array representation of the object
         *
         * @return array
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
         * Constructs object from an array representation
         *
         * @param array $data
         * @return UserProfilePhotos
         */
        public static function fromArray(array $data): UserProfilePhotos
        {
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