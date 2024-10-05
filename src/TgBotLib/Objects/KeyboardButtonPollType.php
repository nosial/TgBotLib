<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\KeyboardButtonPollType as type;
    use TgBotLib\Interfaces\ObjectTypeInterface;

    class KeyboardButtonPollType implements ObjectTypeInterface
    {
        private ?type $type;

        /**
         * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode.
         * If regular is passed, only regular polls will be allowed. Otherwise, the user will be allowed
         * to create a poll of any type.
         *
         * @return type|null
         */
        public function getType(): ?type
        {
            return $this->type;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?KeyboardButtonPollType
        {
            if ($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = type::tryFrom($data['type']);

            return $object;
        }
    }