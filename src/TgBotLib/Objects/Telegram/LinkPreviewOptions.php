<?php

namespace TgBotLib\Objects\Telegram;

use TgBotLib\Interfaces\ObjectTypeInterface;

class LinkPreviewOptions implements ObjectTypeInterface
{
    private bool $is_disabled;
    private ?string $url;
    private bool $prefer_small_media;
    private bool $prefer_large_media;
    private bool $show_above_text;

    /**
     * Optional. True, if the link preview is disabled
     *
     * @return bool
     */
    public function getIsDisabled(): bool
    {
        return $this->is_disabled;
    }

    /**
     * Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
     *
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't
     * explicitly specified or media size change isn't supported for the preview
     *
     * @return bool
     */
    public function getPreferSmallMedia(): bool
    {
        return $this->prefer_small_media;
    }

    /**
     * Optional. True, if the media in the link preview is supposed to be enlarged;
     * ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     *
     * @return bool
     */
    public function getPreferLargeMedia(): bool
    {
        return $this->prefer_large_media;
    }

    /**
     * Optional. True, if the link preview must be shown above the message text; otherwise,
     * the link preview will be shown below the message text
     *
     * @return bool
     */
    public function getShowAboveText(): bool
    {
        return $this->show_above_text;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'is_disabled' => $this->is_disabled,
            'url' => $this->url,
            'prefer_small_media' => $this->prefer_small_media,
            'prefer_large_media' => $this->prefer_large_media,
            'show_above_text' => $this->show_above_text,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        $object = new self();

        $object->is_disabled = $data['is_disabled'] ?? false;
        $object->url = $data['url'] ?? null;
        $object->prefer_small_media = $data['prefer_small_media'] ?? false;
        $object->prefer_large_media = $data['prefer_large_media'] ?? false;
        $object->show_above_text = $data['show_above_text'] ?? false;

        return $object;
    }
}