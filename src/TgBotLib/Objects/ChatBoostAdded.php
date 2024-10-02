<?php

namespace TgBotLib\Objects;

use TgBotLib\Interfaces\ObjectTypeInterface;

class ChatBoostAdded implements ObjectTypeInterface
{
    private int $boost_count;

    /**
     * Number of boosts added by the user
     *
     * @return int
     */
    public function getBoostCount(): int
    {
        return $this->boost_count;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'boost_count' => $this->boost_count
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        $object = new self();
        $object->boost_count = $data['boost_count'];
        return $object;
    }
}