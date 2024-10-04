<?php

namespace TgBotLib\Objects\BackgroundType;

use TgBotLib\Enums\Types\BackgroundType as type;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\BackgroundType;

class BackgroundTypeChatTheme extends BackgroundType implements ObjectTypeInterface
{
    private string $theme_name;

    /**
     * Name of the chat theme, which is usually an emoji
     *
     * @return string
     */
    public function getThemeName(): string
    {
        return $this->theme_name;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type->value,
            'theme_name' => $this->theme_name
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?BackgroundTypeChatTheme
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->type = type::CHAT_THEME;
        $object->theme_name = $data['theme_name'];

        return $object;
    }
}