<?php

namespace TgBotLib\Objects\BackgroundFill;

use TgBotLib\Enums\Types\BackgroundFillType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\BackgroundFill;

class BackgroundFillFreeformGradient extends BackgroundFill implements ObjectTypeInterface
{
    /**
     * @var int[]
     */
    private array $colors;

    /**
     * A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     *
     * @return array
     */
    public function getColors(): array
    {
        return $this->toArray();
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'colors' => $this->colors
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?BackgroundFillFreeformGradient
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();

        $object->type = BackgroundFillType::FREEFORM_GRADIENT;
        $object->colors = $data['colors'];

        return $object;
    }
}