<?php

namespace TgBotLib\Objects\Telegram;

use TgBotLib\Interfaces\ObjectTypeInterface;

class InaccessibleMessage extends MaybeInaccessibleMessage implements ObjectTypeInterface
{
    private Chat $chat;
    private int $message_id;

    /**
     * Chat the message belonged to
     *
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * Unique message identifier inside the chat
     *
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'date' => $this->date
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): InaccessibleMessage
    {
        $object = new self();

        $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
        $object->message_id = $data['message_id'];
        $object->date = $data['data'];

        return $object;
    }
}