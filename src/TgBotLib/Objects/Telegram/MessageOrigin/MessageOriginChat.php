<?php

namespace TgBotLib\Objects\Telegram\MessageOrigin;

use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\Chat;
use TgBotLib\Objects\Telegram\MessageOrigin;

class MessageOriginChat extends MessageOrigin implements ObjectTypeInterface
{
    private Chat $sender_chat;
    private ?string $author_signature;

    /**
     * Unique message identifier inside the chat
     *
     * @return Chat
     */
    public function getSenderChat(): Chat
    {
        return $this->sender_chat;
    }

    /**
     * Optional. Signature of the original post author
     *
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->getType()->value,
            'date' => $this->getDate(),
            'sender_chat' => $this->sender_chat->toArray(),
            'author_signature' => $this->author_signature,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): MessageOrigin
    {
        $object = new self();

        $object->type = MessageOriginType::CHAT;
        $object->date = $data['date'];
        $object->sender_chat = Chat::fromArray($data['sender_chat']);
        $object->author_signature = $data['author_signature'] ?? null;

        return $object;
    }
}