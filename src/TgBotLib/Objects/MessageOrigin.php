<?php

namespace TgBotLib\Objects;

use InvalidArgumentException;
use TgBotLib\Enums\Types\MessageOriginType;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\MessageOrigin\MessageOriginChannel;
use TgBotLib\Objects\MessageOrigin\MessageOriginChat;
use TgBotLib\Objects\MessageOrigin\MessageOriginHiddenUser;
use TgBotLib\Objects\MessageOrigin\MessageOriginUser;

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
     * @inheritDoc
     */
    public abstract function toArray(): array;

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?MessageOrigin
    {
        if($data === null)
        {
            return null;
        }

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