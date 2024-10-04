<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Enums\Types\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeDefault extends BotCommandScope implements ObjectTypeInterface
    {
        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'type' => $this->type->value
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?BotCommandScopeDefault
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = BotCommandScopeType::DEFAULT;

            return $object;
        }
    }