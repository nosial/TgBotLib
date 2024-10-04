<?php

    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class MessageReactionUpdated implements ObjectTypeInterface
    {
        private Chat $chat;
        private int $message_id;
        private ?User $user;
        private ?Chat $actor_chat;
        private int $date;
        /**
         * @var ReactionType[]|null
         */
        private array $old_reaction;
        /**
         * @var ReactionType[]|null
         */
        private array $new_reaction;


        /**
         * The chat containing the message the user reacted to
         *
         * @return Chat
         */
        public function getChat(): Chat
        {
            return $this->chat;
        }

        /**
         * Unique identifier of the message inside the chat
         *
         * @return int
         */
        public function getMessageId(): int
        {
            return $this->message_id;
        }

        /**
         * Optional. The user that changed the reaction, if the user isn't anonymous
         *
         * @return User|null
         */
        public function getUser(): ?User
        {
            return $this->user;
        }

        /**
         * Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
         *
         * @return Chat|null
         */
        public function getActorChat(): ?Chat
        {
            return $this->actor_chat;
        }

        /**
         * Date of the change in Unix time
         *
         * @return int
         */
        public function getDate(): int
        {
            return $this->date;
        }

        /**
         * Previous list of reaction types that were set by the user
         *
         * @return ReactionType[]
         */
        public function getOldReaction(): array
        {
            return $this->old_reaction;
        }

        /**
         * New list of reaction types that have been set by the user
         *
         * @return ReactionType[]
         */
        public function getNewReaction(): array
        {
            return $this->new_reaction;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): ?array
        {
            return [
                'chat' => $this->chat?->toArray(),
                'message_id' => $this->message_id,
                'user' => $this->user?->toArray(),
                'actor_chat' => $this->actor_chat?->toArray(),
                'date' => $this->date,
                'old_reaction' => array_map(fn(ReactionType $reaction) => $reaction->toArray(), $this->old_reaction),
                'new_reaction' => array_map(fn(ReactionType $reaction) => $reaction->toArray(), $this->new_reaction)
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?ObjectTypeInterface
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->chat = isset($data['chat']) ? Chat::fromArray($data['chat']) : null;
            $object->message_id = $data['message_id'];
            $object->user = isset($data['user']) ? User::fromArray($data['user']) : null;
            $object->actor_chat = isset($data['actor_chat']) ? Chat::fromArray($data['actor_chat']) : null;
            $object->date = $data['date'];
            $object->old_reaction = array_map(fn(array $reaction) => ReactionType::fromArray($reaction), $data['old_reaction']);
            $object->new_reaction = array_map(fn(array $reaction) => ReactionType::fromArray($reaction), $data['new_reaction']);

            return $object;
        }
    }