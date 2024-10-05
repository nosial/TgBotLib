<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageAutoDeleteTimerChanged implements ObjectTypeInterface
    {
        private int $message_auto_delete_time;

        /**
         * @return int
         */
        public function getMessageAutoDeleteTime(): int
        {
            return $this->message_auto_delete_time;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'message_auto_delete_time' => $this->message_auto_delete_time,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?MessageAutoDeleteTimerChanged
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->message_auto_delete_time = $data['message_auto_delete_time'];

            return $object;
        }
    }