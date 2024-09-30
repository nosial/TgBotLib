<?php

namespace TgBotLib\Objects\Telegram;

use InvalidArgumentException;
use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Telegram\MessageOrigin\MessageOriginChannel;
use TgBotLib\Objects\Telegram\MessageOrigin\MessageOriginChat;
use TgBotLib\Objects\Telegram\MessageOrigin\MessageOriginHiddenUser;
use TgBotLib\Objects\Telegram\MessageOrigin\MessageOriginUser;

abstract class MessageOrigin implements ObjectTypeInterface
{
    protected MessageOriginType $type;
    protected int $date;

    /**
     *
     * @return MessageOriginType
     */
    public function getType(): MessageOriginType
    {
        return $this->type;
    }

    /**
     * Retrieves the date.
     *
     * @return int The date value.
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * Converts the object to an array representation.
     *
     * @return array The array representation of the object.
     */
    public abstract function toArray(): array;

    /**
     * Converts an associative array to a MessageOrigin object.
     *
     * @param array $data The data representing the message origin.
     * @return MessageOrigin The constructed MessageOrigin object.
     * @throws InvalidArgumentException If the 'type' key is missing or an unknown type is provided.
     */
    public static function fromArray(array $data): MessageOrigin
    {
        if(!isset($data['type']))
        {
            throw new InvalidArgumentException('Message origin type is required');
        }

        return match (MessageOriginType::tryFrom($data['type']))
        {
            MessageOriginType::USER => MessageOriginUser::fromArray($data),
            MessageOriginType::CHAT => MessageOriginChat::fromArray($data),
            MessageOriginType::HIDDEN_USER => MessageOriginHiddenUser::fromArray($data),
            MessageOriginType::CHANNEL => MessageOriginChannel::fromArray($data),
            default => throw new InvalidArgumentException('Unknown message origin type'),
        };
    }
}