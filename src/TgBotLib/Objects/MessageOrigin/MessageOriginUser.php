<?php

namespace TgBotLib\Objects\MessageOrigin;

use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\MessageOrigin;
use TgBotLib\Objects\User;

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
            'type' => $this->type->value,
            'date' => $this->date,
            'sender_user' => $this->sender_user->toArray()
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?MessageOrigin
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->type = MessageOriginType::USER;
        $object->date = $data['date'];
        $object->sender_user = User::fromArray($data['sender_user']);

        return $object;
    }
}