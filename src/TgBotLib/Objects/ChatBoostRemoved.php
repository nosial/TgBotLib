<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class ChatBoostRemoved implements ObjectTypeInterface
    {
        private Chat $chat;
        private string $boost_id;
        private int $remove_date;
        private ChatBoostSource $source;

        public function toArray(): ?array
        {
            // TODO: Implement toArray() method.
        }

        public static function fromArray(?array $data): ?ChatBoostRemoved
        {
            // TODO: Implement fromArray() method.
        }
    }