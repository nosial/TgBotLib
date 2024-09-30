<?php

namespace TgBotLib\Objects\Telegram\MessageOrigin;

use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\Chat;
use TgBotLib\Objects\Telegram\MessageOrigin;

class MessageOriginChannel extends MessageOrigin implements ObjectTypeInterface
{
    private Chat $chat;
    private int $message_id;
    private ?string $author_signature;

    /**
     * Channel chat to which the message was originally sent
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
            'chat' => $this->chat->toArray(),
            'message_id' => $this->message_id,
            'author_signature' => $this->author_signature,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): MessageOrigin
    {
        $object = new self();

        $object->type = MessageOriginType::CHANNEL;
        $object->date = $data['date'];
        $object->chat = Chat::fromArray($data['chat']);
        $object->message_id = $data['message_id'];
        $object->author_signature = $data['author_signature'] ?? null;

        return $object;
    }
}