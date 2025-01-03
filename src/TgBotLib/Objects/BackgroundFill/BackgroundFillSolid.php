<?php

namespace TgBotLib\Objects\BackgroundFill;

use TgBotLib\Enums\Types\BackgroundFillType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\BackgroundFill;

class BackgroundFillSolid extends BackgroundFill implements ObjectTypeInterface
{
    private int $color;

    /**
     * The color of the background fill in the RGB24 format
     *
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'color' => $this->color
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?BackgroundFillSolid
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->type = BackgroundFillType::SOLID;
        $object->color = $data['color'];

        return $object;
    }
}