<?php

namespace TgBotLib\Objects\Telegram\BackgroundType;

use TgBotLib\Enums\Types\BackgroundType as type;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\BackgroundType;
use TgBotLib\Objects\Telegram\Document;

class BackgroundTypeWallpaper extends BackgroundType implements ObjectTypeInterface
{
    private Document $document;
    private int $dark_theme_dimming;
    private bool $is_blurred;
    private bool $is_moving;

    /**
     * Document with the wallpaper
     *
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * Dimming of the background in dark themes, as a percentage; 0-100
     *
     * @return int
     */
    public function getDarkThemeDimming(): int
    {
        return $this->dark_theme_dimming;
    }

    /**
     * Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
     *
     * @return bool
     */
    public function isBlurred(): bool
    {
        return $this->is_blurred;
    }

    /**
     * Optional. True, if the background moves slightly when the device is tilted
     *
     * @return bool
     */
    public function isMoving(): bool
    {
        return $this->is_moving;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'document' => $this->document->toArray(),
            'dark_theme_dimming' => $this->dark_theme_dimming,
            'is_blurred' => $this->is_blurred,
            'is_moving' => $this->is_moving
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): BackgroundTypeWallpaper
    {
        $object = new self();

        $object->type = type::WALLPAPER;
        $object->document = Document::fromArray($data['document']);
        $object->dark_theme_dimming = $data['dark_theme_dimming'];
        $object->is_blurred = $data['is_blurred'] ?? false;
        $object->is_moving = $data['is_moving'] ?? false;

        return $object;
    }
}