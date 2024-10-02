<?php

namespace TgBotLib\Objects;

use InvalidArgumentException;
use TgBotLib\Interfaces\ObjectTypeInterface;

abstract class MaybeInaccessibleMessage implements ObjectTypeInterface
{
    protected int $date;

    /**
     * Always 0. The field can be used to differentiate regular and inaccessible messages.
     *
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @inheritDoc
     */
    public abstract function toArray(): array;

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): MaybeInaccessibleMessage
    {
        if(!isset($data['date']))
        {
            throw new InvalidArgumentException('Expected date in message');
        }

        if((int)$data['date'] === 0)
        {
            return InaccessibleMessage::fromArray($data);
        }

        return Message::fromArray($data);

    }
}