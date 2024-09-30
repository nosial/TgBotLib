<?php

namespace TgBotLib\Objects\Telegram\MessageOrigin;

use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\MessageOrigin;
use TgBotLib\Objects\Telegram\User;

class MessageOriginUser extends MessageOrigin implements ObjectTypeInterface
{
    private User $sender_user;

    /**
     * User that sent the message originally
     *
     * @return User
     */
    public function getSenderUser(): User
    {
        return $this->sender_user;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->getType()->value,
            'date' => $this->getDate(),
            'sender_user' => $this->sender_user->toArray()
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): MessageOrigin
    {
        $object = new self();

        $object->type = MessageOriginType::USER;
        $object->date = $data['date'];
        $object->sender_user = User::fromArray($data['sender_user']);

        return $object;
    }
}