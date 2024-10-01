<?php

namespace TgBotLib\Objects\Telegram;

use InvalidArgumentException;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Enums\Types\BackgroundType as type;
use TgBotLib\Objects\Telegram\BackgroundType\BackgroundTypeChatTheme;
use TgBotLib\Objects\Telegram\BackgroundType\BackgroundTypeFill;
use TgBotLib\Objects\Telegram\BackgroundType\BackgroundTypeWallpaper;

abstract class BackgroundType implements ObjectTypeInterface
{
    protected type $type;

    /**
     * Type of the background
     *
     * @return type
     */
    public function getType(): type
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
    public static function fromArray(array $data): BackgroundType
    {
        if (!isset($data['type']))
        {
            throw new InvalidArgumentException('BackgroundType expected type');
        }

        return match (type::tryFrom($data['type']))
        {
            type::WALLPAPER => BackgroundTypeWallpaper::fromArray($data),
            type::FILL => BackgroundTypeFill::fromArray($data),
            type::CHAT_THEME => BackgroundTypeChatTheme::fromArray($data),
            default => throw new InvalidArgumentException("Invalid BackgroundType Type")
        };
    }
}