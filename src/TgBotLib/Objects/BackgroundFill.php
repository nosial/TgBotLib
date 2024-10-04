<?php

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\BackgroundFillType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BackgroundFill\BackgroundFillFreeformGradient;
    use TgBotLib\Objects\BackgroundFill\BackgroundFillGradient;
    use TgBotLib\Objects\BackgroundFill\BackgroundFillSolid;

    abstract class BackgroundFill implements ObjectTypeInterface
    {
        protected BackgroundFillType $type;

        /**
         * Type of the background fill
         *
         * @return BackgroundFillType
         */
        public function getType(): BackgroundFillType
        {
            return $this->type;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BackgroundFill
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('BackgroundFill expected type');
            }

            return match(BackgroundFillType::tryFrom($data['type']))
            {
                BackgroundFillType::SOLID => BackgroundFillSolid::fromArray($data),
                BackgroundFillType::GRADIENT => BackgroundFillGradient::fromArray($data),
                BackgroundFillType::FREEFORM_GRADIENT => BackgroundFillFreeformGradient::fromArray($data),
                default => throw new InvalidArgumentException("Invalid BackgroundFill Type")
            };
        }
    }