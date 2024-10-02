<?php

    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InlineQueryResultType;
    use TgBotLib\Exceptions\NotImplementedException;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultArticle;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultAudio;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultContact;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultDocument;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultGame;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultGif;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultLocation;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultMpeg4Gif;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultPhoto;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultVenue;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultVideo;
    use TgBotLib\Objects\InlineQueryResult\InlineQueryResultVoice;

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