<?php


    namespace TgBotLib\Objects\BotCommandScope;

    use TgBotLib\Enums\Types\BotCommandScopeType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\BotCommandScope;

    class BotCommandScopeChatAdministrators extends BotCommandScope implements ObjectTypeInterface
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
        public static function fromArray(?array $data): ?BotCommandScopeChatAdministrators
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->type = BotCommandScopeType::CHAT_ADMINISTRATORS;

            return $object;
        }
    }