<?php

    /** @noinspection PhpMissingFieldTypeInspection */

    namespace TgBotLib\Objects\Telegram;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageAutoDeleteTimerChanged implements ObjectTypeInterface
    {
        /**
         * @var int
         */
        private $message_auto_delete_time;

        /**
         * @return int
         */
        public function getMessageAutoDeleteTime(): int
        {
            return $this->message_auto_delete_time;
        }

        /**
         * Returns an array representation of the object.
         *
         * @return array
         */
        public function toArray(): array
        {
            return [
                'message_auto_delete_time' => $this->message_auto_delete_time,
            ];
        }

        /**
         * Constructs the object from an array representation.
         *
         * @param array $data
         * @return MessageAutoDeleteTimerChanged
         */
        public static function fromArray(array $data): self
        {
            $object = new self();

            $object->message_auto_delete_time = $data['message_auto_delete_time'];

            return $object;
        }
    }