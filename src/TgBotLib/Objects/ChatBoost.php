<?php

        namespace TgBotLib\Objects;

        use TgBotLib\Interfaces\ObjectTypeInterface;

        class ChatBoost implements ObjectTypeInterface
        {
            private string $boost_id;
            private int $add_date;
            private int $expiration_date;
            private ChatBoostSource $source;

            /**
             * Unique identifier of the boost
             *
             * @return string
             */
            public function getBoostId(): string
            {
                return $this->boost_id;
            }

            /**
             * Point in time (Unix timestamp) when the chat was boosted
             *
             * @return int
             */
            public function getAddDate(): int
            {
                return $this->add_date;
            }

            /**
             * Point in time (Unix timestamp) when the boost will automatically expire,
             * unless the booster's Telegram Premium subscription is prolonged
             *
             * @return int
             */
            public function getExpirationDate(): int
            {
                return $this->expiration_date;
            }

            /**
             * Source of the added boost
             *
             * @return ChatBoostSource
             */
            public function getSource(): ChatBoostSource
            {
                return $this->source;
            }

            /**
             * @inheritDoc
             */
            public function toArray(): ?array
            {
                return [
                    'boost_id' => $this->boost_id,
                    'add_date' => $this->add_date,
                    'expiration_date' => $this->expiration_date,
                    'source' => $this->source->toArray()
                ];
            }

            /**
             * @inheritDoc
             */
            public static function fromArray(?array $data): ?ChatBoost
            {
                if($data === null)
                {
                    return null;
                }

                $object = new self();
                $object->boost_id = $data['boost_id'];
                $object->add_date = $data['add_date'];
                $object->expiration_date = $data['expiration_date'];
                $object->source = ChatBoostSource::fromArray($data['source']);

                return $object;
            }
        }