<?php

namespace TgBotLib\Objects\Telegram\PaidMedia;

use TgBotLib\Enums\Types\PaidMediaType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\PaidMedia;
use TgBotLib\Objects\Telegram\PhotoSize;

class PaidMediaPhoto extends PaidMedia implements ObjectTypeInterface
{
    /**
     * @var PhotoSize[]
     */
    private array $photo;

    /**
     * Type of the paid media, always “photo”
     *
     * @return PaidMediaType
     */
    public function getType(): PaidMediaType
    {
        return $this->type;
    }

    /**
     * The photo
     *
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'photo' => array_map(fn(PhotoSize $photo) => $photo->toArray(), $this->photo),
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): PaidMediaPhoto
    {
        $object = new self();

        $object->type = PaidMediaType::PHOTO;
        $object->photo = array_map(fn(array $photo) => PhotoSize::fromArray($photo), $data['photo']);

        return $object;
    }
}