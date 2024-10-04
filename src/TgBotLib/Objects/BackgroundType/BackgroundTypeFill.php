<?php

namespace TgBotLib\Objects\BackgroundType;

use TgBotLib\Enums\Types\BackgroundType as type;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\BackgroundFill;
use TgBotLib\Objects\BackgroundType;

class BackgroundTypeFill extends BackgroundType implements ObjectTypeInterface
{
    private BackgroundFill $fill;
    private int $dark_theme_dimming;

    /**
     * The background fill
     *
     * @return BackgroundFill
     */
    public function getFill(): BackgroundFill
    {
        return $this->fill;
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
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'fill' => $this->fill->toArray(),
            'dark_theme_dimming' => $this->dark_theme_dimming
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?BackgroundTypeFill
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->type = type::FILL;
        $object->fill = BackgroundFill::fromArray($data['fill']);
        $object->dark_theme_dimming = $data['dark_theme_dimming'];

        return $object;
    }
}