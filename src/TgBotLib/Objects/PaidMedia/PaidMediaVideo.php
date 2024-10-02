<?php

namespace TgBotLib\Objects\PaidMedia;

use TgBotLib\Enums\Types\PaidMediaType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\PaidMedia;
use TgBotLib\Objects\Video;

class PaidMediaVideo extends PaidMedia implements ObjectTypeInterface
{
    private Video $video;

    /**
     * The video
     *
     * @return Video
     */
    public function getVideo(): Video
    {
        return $this->video;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'video' => $this->video->toArray(),
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): PaidMediaVideo
    {
        $object = new self();

        $object->type = PaidMediaType::VIDEO;
        $object->video = Video::fromArray($data['video']);

        return $object;
    }
}