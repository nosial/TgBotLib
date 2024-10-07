<?php

namespace TgBotLib\Objects;

use TgBotLib\Interfaces\ObjectTypeInterface;

class LinkPreviewOptions implements ObjectTypeInterface
{
    private bool $is_disabled;
    private ?string $url;
    private bool $prefer_small_media;
    private bool $prefer_large_media;
    private bool $show_above_text;

    /**
     * LinkPreviewOptions constructor.
     */
    public function __construct()
    {
        $this->is_disabled = false;
        $this->url = null;
        $this->prefer_small_media = false;
        $this->prefer_large_media = false;
        $this->show_above_text = false;
    }

    /**
     * Optional. True, if the link preview is disabled
     *
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->is_disabled;
    }

    /**
     * Sets the value of is_disabled
     *
     * @param bool $is_disabled
     * @return LinkPreviewOptions
     */
    public function setDisabled(bool $is_disabled): LinkPreviewOptions
    {
        $this->is_disabled = $is_disabled;
        return $this;
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
     * Sets the value of url
     *
     * @param string|null $url
     * @return LinkPreviewOptions
     */
    public function setUrl(?string $url): LinkPreviewOptions
    {
        $this->url = $url;
        return $this;
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
     * Sets the value of prefer_small_media
     *
     * @param bool $prefer_small_media
     * @return LinkPreviewOptions
     */
    public function setPreferSmallMedia(bool $prefer_small_media): LinkPreviewOptions
    {
        $this->prefer_small_media = $prefer_small_media;
        return $this;
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
     * Sets the value of prefer_large_media
     *
     * @param bool $prefer_large_media
     * @return LinkPreviewOptions
     */
    public function setPreferLargeMedia(bool $prefer_large_media): LinkPreviewOptions
    {
        $this->prefer_large_media = $prefer_large_media;
        return $this;
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
     * Sets the value of show_above_text
     *
     * @param bool $show_above_text
     * @return LinkPreviewOptions
     */
    public function setShowAboveText(bool $show_above_text): LinkPreviewOptions
    {
        $this->show_above_text = $show_above_text;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $array = [
            'is_disabled' => $this->is_disabled,
            'prefer_small_media' => $this->prefer_small_media,
            'prefer_large_media' => $this->prefer_large_media,
            'show_above_text' => $this->show_above_text,
        ];

        if($this->url !== null)
        {
            $array['url'] = $this->url;
        }

        return $array;
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(?array $data): ?LinkPreviewOptions
    {
        if($data === null)
        {
            return null;
        }

        $object = new self();
        $object->is_disabled = $data['is_disabled'] ?? false;
        $object->url = $data['url'] ?? null;
        $object->prefer_small_media = $data['prefer_small_media'] ?? false;
        $object->prefer_large_media = $data['prefer_large_media'] ?? false;
        $object->show_above_text = $data['show_above_text'] ?? false;

        return $object;
    }
}