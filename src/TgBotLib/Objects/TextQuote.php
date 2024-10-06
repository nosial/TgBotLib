<?php

namespace TgBotLib\Objects;

use TgBotLib\Interfaces\ObjectTypeInterface;

class TextQuote implements ObjectTypeInterface
{
    private string $text;
    private ?array $entities;
    private int $position;
    private bool $is_manual;

    /**
     * Text of the quoted part of a message that is replied to by the given message
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Optional. Special entities that appear in the quote. Currently, only bold, italic,
     * underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
     *
     * @return array|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * Approximate quote position in the original message in UTF-16 code units as specified by the sender
     *
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * Optional. True, if the quote was chosen manually by the message sender.
     * Otherwise, the quote was added automatically by the server.
     *
     * @return bool
     */
    public function isIsManual(): bool
    {
        return $this->is_manual;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'entities' => $this->entities,
            'position' => $this->position,
            'is_manual' => $this->is_manual
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?TextQuote
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->text = $data['text'];
        $object->entities = $data['entities'] ?? null;
        $object->position = $data['position'] ?? null;
        $object->is_manual = $data['is_manual'] ?? false;

        return $object;
    }
}