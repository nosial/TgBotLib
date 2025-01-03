<?php

    namespace TgBotLib\Enums\Types;

    enum ChatActionType : string
    {
        case TYPING = 'typing';
        case UPLOAD_PHOTO = 'upload_photo';
        case RECORD_VIDEO = 'record_video';
        case UPLOAD_VIDEO = 'upload_video';
        case RECORD_VOICE = 'record_voice';
        case CHOOSE_STICKER = 'choose_sticker';
        case FIND_LOCATION = 'find_location';
        case RECORD_VIDEO_NOTE = 'record_video_note';
        case UPLOAD_VIDEO_NOTE = 'upload_video_note';
    }