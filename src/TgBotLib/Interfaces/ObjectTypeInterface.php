<?php

    namespace TgBotLib\Interfaces;

    interface ObjectTypeInterface
    {
        /**
         * Returns an array representation of the object
         *
         * @return array
         */
        public function toArray(): array;

        /**
         * Reconstruction of the object from an array
         *
         * @param array|null $data
         * @return ObjectTypeInterface|null
         */
        public static function fromArray(?array $data): ?ObjectTypeInterface;
    }