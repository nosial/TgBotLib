<?php

namespace TgBotLib\Objects;

use InvalidArgumentException;
use TgBotLib\Interfaces\ObjectTypeInterface;

class ChatBackground implements ObjectTypeInterface
{
    private BackgroundType $type;

    /**
     * Type of the background
     *
     * @return BackgroundType
     */
    public function getType(): BackgroundType
    {
        return $this->type;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->toArray()
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        if (!isset($data['type']))
        {
            throw new InvalidArgumentException('ChatBackground expected type');
        }

        $object = new self();
        $object->type = BackgroundType::fromArray($data['type']);
        return $object;
    }
}