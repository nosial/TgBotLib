<?php

    namespace TgBotLib\Enums\Types;

    enum ThumbnailMimeType : string
    {
        case IMAGE_JPEG = 'image/jpeg';
        case IMAGE_GIF = 'image/gif';
        case VIDEO_MP4 = 'video/mp4';
    }