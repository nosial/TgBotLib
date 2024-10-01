<?php

namespace TgBotLib\Objects\Telegram;

use InvalidArgumentException;
use TgBotLib\Enums\Types\BackgroundFillType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\BackgroundFill\BackgroundFillFreeformGradient;
use TgBotLib\Objects\Telegram\BackgroundFill\BackgroundFillGradient;
use TgBotLib\Objects\Telegram\BackgroundFill\BackgroundFillSolid;

abstract class BackgroundFill implements ObjectTypeInterface
{
    protected BackgroundFillType $type;

    /**
     * Type of the background fill
     *
     * @return BackgroundFillType
     */
    public function getType(): BackgroundFillType
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
    public static function fromArray(array $data): BackgroundFill
    {
        if(!isset($data['type']))
        {
            throw new InvalidArgumentException('BackgroundFill expected type');
        }

        return match(BackgroundFillType::tryFrom($data['type']))
        {
            BackgroundFillType::SOLID => BackgroundFillSolid::fromArray($data),
            BackgroundFillType::GRADIENT => BackgroundFillGradient::fromArray($data),
            BackgroundFillType::FREEFORM_GRADIENT => BackgroundFillFreeformGradient::fromArray($data),
            default => throw new InvalidArgumentException("Invalid BackgroundFill Type")
        };
    }
}