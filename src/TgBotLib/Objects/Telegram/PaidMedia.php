<?php

namespace TgBotLib\Objects\Telegram;

use InvalidArgumentException;
use TgBotLib\Enums\Types\PaidMediaType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\PaidMedia\PaidMediaPhoto;
use TgBotLib\Objects\Telegram\PaidMedia\PaidMediaPreview;
use TgBotLib\Objects\Telegram\PaidMedia\PaidMediaVideo;

abstract class PaidMedia implements ObjectTypeInterface
{
    protected PaidMediaType $type;

    /**
     * Type of the paid media
     *
     * @return PaidMediaType
     */
    public function getType(): PaidMediaType
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public abstract function toArray(): array;

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): PaidMedia
    {
        if(!isset($data['type']))
        {
            throw new InvalidArgumentException('Paid media type is required');
        }

        return match (PaidMediaType::tryFrom($data['type']))
        {
            PaidMediaType::PHOTO => PaidMediaPhoto::fromArray($data),
            PaidMediaType::VIDEO => PaidMediaVideo::fromArray($data),
            PaidMediaType::PREVIEW => PaidMediaPreview::fromArray($data),
        };
    }
}