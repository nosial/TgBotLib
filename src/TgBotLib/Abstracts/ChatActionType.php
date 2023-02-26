<?php

    namespace TgBotLib\Abstracts;

    abstract class ChatActionType
    {
        const Typing = 'typing';
        const UploadPhoto = 'upload_photo';
        const RecordVideo = 'record_video';
        const UploadVideo = 'upload_video';
        const RecordAudio = 'record_audio';
        const UploadAudio = 'upload_audio';
        const UploadDocument = 'upload_document';
        const FindLocation = 'find_location';
        const RecordVideoNote = 'record_video_note';
        const UploadVideoNote = 'upload_video_note';
    }