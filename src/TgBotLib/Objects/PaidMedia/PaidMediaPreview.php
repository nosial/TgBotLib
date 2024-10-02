<?php

namespace TgBotLib\Objects\PaidMedia;

use TgBotLib\Enums\Types\PaidMediaType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\PaidMedia;

class PaidMediaPreview extends PaidMedia implements ObjectTypeInterface
{
    private ?int $width;
    private ?int $height;
    private ?int $duration;

    /**
     * Optional. Media width as defined by the sender
     *
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * Optional. Media height as defined by the sender
     *
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * Optional. Duration of the media in seconds as defined by the sender
     *
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'width' => $this->width,
            'height' => $this->height,
            'duration' => $this->duration,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): PaidMediaPreview
    {
        $object = new self();

        $object->type = PaidMediaType::PREVIEW;
        $object->width = $data['width'] ?? null;
        $object->height = $data['height'] ?? null;
        $object->duration = $data['duration'] ?? null;

        return $object;
    }
}