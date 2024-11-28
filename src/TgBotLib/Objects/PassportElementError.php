<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Enums\Types\PassportElementErrorSourceType;
    use TgBotLib\Interfaces\ObjectTypeInterface;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorDataField;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorFile;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorFiles;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorFrontSide;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorReverseSide;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorSelfie;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorTranslationFile;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorTranslationFiles;
    use TgBotLib\Objects\PassportElementError\PassportElementErrorUnspecified;

    abstract class PassportElementError implements ObjectTypeInterface
    {
        private PassportElementErrorSourceType $source;

        /**
         * Public Constructor
         *
         * @param array|null $data
         */
        public function __construct(?array $data=null)
        {
            if($data == null)
            {
                $this->source = PassportElementErrorSourceType::UNSPECIFIED;
                return;
            }

            $this->source = PassportElementErrorSourceType::tryFrom($data['source'] ?? null);
        }

        /**
         * The error source
         *
         * @return PassportElementErrorSourceType
         */
        public function getSource(): PassportElementErrorSourceType
        {
            return $this->source;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return null;
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?PassportElementError
        {
            return match(PassportElementErrorSourceType::tryFrom($data['source']))
            {
                PassportElementErrorSourceType::DATA => PassportElementErrorDataField::fromArray($data),
                PassportElementErrorSourceType::FILE => PassportElementErrorFile::fromArray($data),
                PassportElementErrorSourceType::FILES => PassportElementErrorFiles::fromArray($data),
                PassportElementErrorSourceType::FRONT_SIDE => PassportElementErrorFrontSide::fromArray($data),
                PassportElementErrorSourceType::REVERSE_SIDE => PassportElementErrorReverseSide::fromArray($data),
                PassportElementErrorSourceType::SELFIE => PassportElementErrorSelfie::fromArray($data),
                PassportElementErrorSourceType::TRANSLATION_FILE => PassportElementErrorTranslationFile::fromArray($data),
                PassportElementErrorSourceType::TRANSLATION_FILES => PassportElementErrorTranslationFiles::fromArray($data),
                PassportElementErrorSourceType::UNSPECIFIED => PassportElementErrorUnspecified::fromArray($data),
            };
        }
    }