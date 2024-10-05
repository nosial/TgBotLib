<?php


    namespace TgBotLib\Objects\Stickers;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MaskPosition implements ObjectTypeInterface
    {
        private string $point;
        private int|float $x_shift;
        private int|float $y_shift;
        private int|float $scale;

        /**
         * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or
         * “chin”.
         *
         * @return string
         */
        public function getPoint(): string
        {
            return $this->point;
        }

        /**
         * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example,
         * choosing -1.0 will place mask just to the left of the default mask position.
         *
         * @return float|int
         */
        public function getXShift(): float|int
        {
            return $this->x_shift;
        }

        /**
         * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example,
         * 1.0 will place the mask just below the default mask position.
         *
         * @return float|int
         */
        public function getYShift(): float|int
        {
            return $this->y_shift;
        }

        /**
         * Mask scaling coefficient. For example, 2.0 means double size.
         *
         * @return float|int
         */
        public function getScale(): float|int
        {
            return $this->scale;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'point'   => $this->point,
                'x_shift' => $this->x_shift,
                'y_shift' => $this->y_shift,
                'scale'   => $this->scale,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MaskPosition
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->point = $data['point'] ?? null;
            $object->x_shift = $data['x_shift'] ?? null;
            $object->y_shift = $data['y_shift'] ?? null;
            $object->scale = $data['scale'] ?? null;

            return $object;
        }
    }