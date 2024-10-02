<?php

namespace TgBotLib\Objects\MessageOrigin;

use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\MessageOrigin;

class MessageOriginHiddenUser extends MessageOrigin implements ObjectTypeInterface
{
    private string $sender_user_name;

    /**
     * Name of the user that sent the message originally
     *
     * @return string
     */
    public function getSenderUserName(): string
    {
        return $this->sender_user_name;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->getType()->value,
            'date' => $this->getDate(),
            'sender_user_name' => $this->sender_user_name
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): MessageOrigin
    {
        $object = new self();

        $object->type = MessageOriginType::HIDDEN_USER;
        $object->date = $data['date'];
        $object->sender_user_name = $data['sender_user_name'];

        return $object;
    }
}