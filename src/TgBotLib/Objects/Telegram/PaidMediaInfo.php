<?php

namespace TgBotLib\Objects\Telegram;

use TgBotLib\Interfaces\ObjectTypeInterface;

class PaidMediaInfo implements ObjectTypeInterface
{
    private int $star_count;

    /**
     * @var PaidMedia[]
     */
    private array $paid_media;

    /**
     * The number of Telegram Stars that must be paid to buy access to the media
     *
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->star_count;
    }

    /**
     * Information about the paid media
     *
     * @return PaidMedia[]
     */
    public function getPaidMedia(): array
    {
        return $this->paid_media;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'star_count' => $this->star_count,
            'paid_media' => array_map(fn(PaidMedia $paid_media) => $paid_media->toArray(), $this->paid_media),
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): PaidMediaInfo
    {
        $object = new self();

        $object->star_count = $data['star_count'];
        $object->paid_media = array_map(fn(array $paid_media) => PaidMedia::fromArray($paid_media), $data['paid_media']);

        return $object;
    }
}