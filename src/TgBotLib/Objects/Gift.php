<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Stickers\Sticker;

    class Gift implements ObjectTypeInterface
    {
        private string $id;
        private Sticker $sticker;
        private int $starCount;
        private ?int $totalCount;
        private ?int $remainingCount;

        /**
         * This object represents a gift that can be sent by the bot.
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data == null)
            {
                return;
            }

            $this->id = $data['id'];
            $this->sticker = Sticker::fromArray($data['sticker']);
            $this->starCount = $data['star_count'];
            $this->totalCount = $data['total_count'] ?? null;
            $this->remainingCount = $data['remaining_count'] ?? null;
        }

        /**
         * Unique identifier of the gift
         *
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * The sticker that represents the gift
         *
         * @return Sticker
         */
        public function getSticker(): Sticker
        {
            return $this->sticker;
        }

        /**
         * The number of Telegram Stars that must be paid to send the sticker
         *
         * @return int
         */
        public function getStarCount(): int
        {
            return $this->starCount;
        }

        /**
         * Optional. The total number of the gifts of this type that can be sent; for limited gifts only
         *
         * @return int|null
         */
        public function getTotalCount(): ?int
        {
            return $this->totalCount;
        }

        /**
         * Optional. The number of remaining gifts of this type that can be sent; for limited gifts only
         *
         * @return int|null
         */
        public function getRemainingCount(): ?int
        {
            return $this->remainingCount;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'id' => $this->id,
                'sticker' => $this->sticker->toArray(),
                'star_count' => $this->starCount,
                'total_count' => $this->totalCount,
                'remaining_count' => $this->remainingCount
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?Gift
        {
            return new self($data);
        }
    }