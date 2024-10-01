<?php

namespace TgBotLib\Objects\Telegram\BackgroundType;

use TgBotLib\Enums\Types\BackgroundType as type;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\BackgroundFill;
use TgBotLib\Objects\Telegram\BackgroundType;
use TgBotLib\Objects\Telegram\Document;

class BackgroundTypePattern extends BackgroundType implements ObjectTypeInterface
{
    private Document $document;
    private BackgroundFill $fill;
    private int $intensity;
    private bool $is_inverted;
    private bool $is_moving;

    /**
     * Document with the pattern
     *
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * The background fill that is combined with the pattern
     *
     * @return BackgroundFill
     */
    public function getFill(): BackgroundFill
    {
        return $this->fill;
    }

    /**
     * Intensity of the pattern when it is shown above the filled background; 0-100
     *
     * @return int
     */
    public function getIntensity(): int
    {
        return $this->intensity;
    }

    /**
     * Optional. True, if the background fill must be applied only to the pattern itself.
     * All other pixels are black in this case. For dark themes only
     *
     * @return bool
     */
    public function isInverted(): bool
    {
        return $this->is_inverted;
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
            'fill' => $this->fill,
            'intensity' => $this->intensity,
            'is_inverted' => $this->is_inverted,
            'is_moving' => $this->is_moving
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): BackgroundTypePattern
    {
        $object = new self();

        $object->type = type::PATTERN;
        $object->document = Document::fromArray($data['document']);
        $object->fill = BackgroundFill::fromArray($data['fill']);
        $object->intensity = (int)$data['intensity'];
        $object->is_inverted = $data['is_inverted'] ?? false;
        $object->is_moving = $data['is_moving'] ?? false;


        return $object;
    }
}