<?php

namespace TgBotLib\Methods;

use TgBotLib\Abstracts\Method;
use TgBotLib\Bot;
use TgBotLib\Enums\Methods;
use TgBotLib\Enums\Types\ParseMode;
use TgBotLib\Exceptions\TelegramException;
use TgBotLib\Interfaces\ObjectTypeInterface;
use TgBotLib\Objects\Message;
use TgBotLib\Objects\MessageEntity;
use TgBotLib\Objects\ReplyParameters;

class SendVideo extends Method
{
    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document).
     * On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit
     * may be changed in the future.
     *
     * @param Bot $bot
     * @param array $parameters
     * @return Message
     * @throws TelegramException
     */
    public static function execute(Bot $bot, array $parameters=[]): Message
    {
        // Handle object conversions
        if(isset($parameters['parse_mode']) && $parameters['parse_mode'] instanceof ParseMode)
        {
            $parameters['parse_mode'] = $parameters['parse_mode']->value;
        }

        if(isset($parameters['caption_entities']) && is_array($parameters['caption_entities']))
        {
            $entities = [];
            foreach($parameters['caption_entities'] as $entity)
            {
                if($entity instanceof MessageEntity)
                {
                    $entities[] = $entity->toArray();
                }
                else
                {
                    $entities[] = $entity;
                }
            }
            $parameters['caption_entities'] = $entities;
        }

        if(isset($parameters['reply_parameters']) && $parameters['reply_parameters'] instanceof ReplyParameters)
        {
            $parameters['reply_parameters'] = $parameters['reply_parameters']->toArray();
        }

        if(isset($parameters['reply_markup']) && $parameters['reply_markup'] instanceof ObjectTypeInterface)
        {
            $parameters['reply_markup'] = $parameters['reply_markup']->toArray();
        }

        // Handle file uploads
        $hasLocalVideo = isset($parameters['video']) && is_string($parameters['video']) && file_exists($parameters['video']) && is_file($parameters['video']);
        $hasLocalThumb = isset($parameters['thumbnail']) && is_string($parameters['thumbnail']) && file_exists($parameters['thumbnail']) && is_file($parameters['thumbnail']);

        if ($hasLocalVideo || $hasLocalThumb)
        {
            $files = [];

            if ($hasLocalVideo)
            {
                $files['video'] = $parameters['video'];
                unset($parameters['video']);
            }

            if ($hasLocalThumb)
            {
                $files['thumbnail'] = $parameters['thumbnail'];
                unset($parameters['thumbnail']);
            }

            if (count($files) > 1)
            {
                // Multiple files to upload
                $curl = self::buildMultiUpload($bot, Methods::SEND_VIDEO->value, $files, $parameters);
            }
            else
            {
                // Single file to upload
                $fileParam = array_key_first($files);
                $curl = self::buildUpload($bot, Methods::SEND_VIDEO->value, $fileParam, $files[$fileParam], $parameters);
            }

            return Message::fromArray(self::executeCurl($curl));
        }

        // If no local files to upload, use regular POST method
        return Message::fromArray(self::executeCurl(self::buildPost($bot, Methods::SEND_VIDEO->value, $parameters)));
    }

    /**
     * @inheritDoc
     */
    public static function getRequiredParameters(): ?array
    {
        return [
            'chat_id',
            'video'
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getOptionalParameters(): ?array
    {
        return [
            'business_connection_id',
            'message_thread_id',
            'duration',
            'width',
            'height',
            'thumbnail',
            'caption',
            'parse_mode',
            'caption_entities',
            'show_caption_above_media',
            'has_spoiler',
            'supports_streaming',
            'disable_notification',
            'protect_content',
            'message_effect_id',
            'reply_parameters',
            'reply_markup'
        ];
    }
}