<?php

    namespace TgBotLib\Objects\Telegram;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Exceptions\NotImplementedException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultArticle;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultAudio;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultContact;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultDocument;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultGame;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultGif;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultLocation;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultMpeg4Gif;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultPhoto;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVenue;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVideo;
    use TgBotLib\Objects\Telegram\InlineQueryResult\InlineQueryResultVoice;

    class InlineQueryResult implements ObjectTypeInterface
    {

        /**
         * Returns an array representation of the object
         *
         * @return array
         * @throws NotImplementedException
         * @deprecated Don't use, use fromArray() instead directly to construct the appropriate child class
         */
        public function toArray(): array
        {
            throw new NotImplementedException('This object is abstract, you can\'t use it directly, try constructing one of the child classes with fromArray()');
        }

        /**
         * Returns an object constructed from the given array
         *
         * @param array $data
         * @return ObjectTypeInterface
         */
        public static function fromArray(array $data): ObjectTypeInterface
        {
            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('The type of the InlineQueryResult is not set, this is required!');
            }

            return match (strtolower($data['type']))
            {
                InlineQueryResultType::ARTICLE => InlineQueryResultArticle::fromArray($data),
                InlineQueryResultType::PHOTO => InlineQueryResultPhoto::fromArray($data),
                InlineQueryResultType::GIF => InlineQueryResultGif::fromArray($data),
                InlineQueryResultType::MPEG_4_GIF => InlineQueryResultMpeg4Gif::fromArray($data),
                InlineQueryResultType::VIDEO => InlineQueryResultVideo::fromArray($data),
                InlineQueryResultType::AUDIO => InlineQueryResultAudio::fromArray($data),
                InlineQueryResultType::VOICE => InlineQueryResultVoice::fromArray($data),
                InlineQueryResultType::DOCUMENT => InlineQueryResultDocument::fromArray($data),
                InlineQueryResultType::LOCATION => InlineQueryResultLocation::fromArray($data),
                InlineQueryResultType::VENUE => InlineQueryResultVenue::fromArray($data),
                InlineQueryResultType::CONTACT => InlineQueryResultContact::fromArray($data),
                InlineQueryResultType::GAME => InlineQueryResultGame::fromArray($data),
                default => throw new InvalidArgumentException(sprintf('The type of the InlineQueryResult is invalid, got "%s", expected one of "%s"', $data['type'], implode('", "', InlineQueryResultType::ALL))),
            };
        }
    }