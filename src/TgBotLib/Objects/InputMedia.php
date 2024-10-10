<?php


    namespace TgBotLib\Objects;

    use InvalidArgumentException;
    use TgBotLib\Enums\Types\InputMediaType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\InputMedia\InputMediaAnimation;
    use TgBotLib\Objects\InputMedia\InputMediaAudio;
    use TgBotLib\Objects\InputMedia\InputMediaDocument;
    use TgBotLib\Objects\InputMedia\InputMediaPhoto;
    use TgBotLib\Objects\InputMedia\InputMediaVideo;

    abstract class InputMedia implements ObjectTypeInterface
    {
        protected InputMediaType $type;
        protected string $media;

        /**
         * Type of the result, can be photo, video, animation, audio or document
         *
         * @return InputMediaType
         */
        public function getType(): InputMediaType
        {
            return $this->type;
        }

        /**
         * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended),
         * pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://<file_attach_name>” to
         * upload a new one using multipart/form-data under <file_attach_name> name.
         *
         * @return string
         */
        public function getMedia(): string
        {
            return $this->media;
        }

        /**
         * Sets the media content to upload
         *
         * @param string $media
         * @return $this
         */
        public function setMedia(string $media): self
        {
            $this->media = $media;
            return $this;
        }

        /**
         * @inheritDoc
         */
        public abstract function toArray(): array;

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?InputMedia
        {
            if($data === null)
            {
                return null;
            }

            if(!isset($data['type']))
            {
                throw new InvalidArgumentException('type is not provided');
            }

            if(!isset($data['media']))
            {
                throw new InvalidArgumentException('media is not provided');
            }

            return match (InputMediaType::tryFrom($data['type']))
            {
                InputMediaType::PHOTO => InputMediaPhoto::fromArray($data),
                InputMediaType::VIDEO => InputMediaVideo::fromArray($data),
                InputMediaType::ANIMATION => InputMediaAnimation::fromArray($data),
                InputMediaType::AUDIO => InputMediaAudio::fromArray($data),
                InputMediaType::DOCUMENT => InputMediaDocument::fromArray($data),
                default => throw new InvalidArgumentException('Unknown type')
            };
        }
    }