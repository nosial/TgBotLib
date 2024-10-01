<?php

namespace TgBotLib\Objects\Telegram\BackgroundFill;

use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\BackgroundFill;

class BackgroundFillGradient extends BackgroundFill implements ObjectTypeInterface
{
    private int $top_color;
    private int $bottom_color;
    private int $rotation_angle;

    /**
     * Top color of the gradient in the RGB24 format
     *
     * @return int
     */
    public function getTopColor(): int
    {
        return $this->top_color;
    }

    /**
     * Bottom color of the gradient in the RGB24 format
     *
     * @return int
     */
    public function getBottomColor(): int
    {
        return $this->bottom_color;
    }

    /**
     * Clockwise rotation angle of the background fill in degrees; 0-359
     *
     * @return int
     */
    public function getRotationAngle(): int
    {
        return $this->rotation_angle;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'top_color' => $this->top_color,
            'bottom_color' => $this->bottom_color,
            'rotation_angle' => $this->rotation_angle
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): BackgroundFillGradient
    {
        $object = new self();
        $object->type = $data['type'] ?? null;
        $object->top_color = $data['top_color'] ?? 0;
        $object->bottom_color = $data['bottom_color'] ?? 0;
        $object->rotation_angle = $data['rotation_angle'] ?? 0;
        return $object;
    }
}