<?php


    namespace TgBotLib\Objects;

    use TgBotLib\Interfaces\ObjectTypeInterface;

    class WebhookInfo implements ObjectTypeInterface
    {
        private string $url;
        private bool $has_custom_certificate;
        private int $pending_update_count;
        private ?string $ip_address;
        private ?int $last_error_date;
        private ?string $last_error_message;
        private ?int $last_synchronization_error_date;
        private ?int $max_connections;
        private ?array $allowed_updates;

        /**
         * Webhook URL, may be empty if webhook is not set up
         *
         * @return string
         */
        public function getUrl(): string
        {
            return $this->url;
        }

        /**
         * True, if a custom certificate was provided for webhook certificate checks
         *
         * @return bool
         */
        public function hasCustomCertificate(): bool
        {
            return $this->has_custom_certificate;
        }

        /**
         * Number of updates awaiting delivery
         *
         * @return int
         */
        public function getPendingUpdateCount(): int
        {
            return $this->pending_update_count;
        }

        /**
         * Optional. Currently used webhook IP address
         *
         * @return string|null
         */
        public function getIpAddress(): ?string
        {
            return $this->ip_address;
        }

        /**
         * Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
         *
         * @return int|null
         */
        public function getLastErrorDate(): ?int
        {
            return $this->last_error_date;
        }

        /**
         * Optional. Error message in human-readable format for the most recent error that happened when trying to
         * deliver an update via webhook
         *
         * @return string|null
         */
        public function getLastErrorMessage(): ?string
        {
            return $this->last_error_message;
        }

        /**
         * Optional. Unix time of the most recent error that happened when trying to synchronize available updates with
         * Telegram datacenters
         *
         * @return int|null
         */
        public function getLastSynchronizationErrorDate(): ?int
        {
            return $this->last_synchronization_error_date;
        }

        /**
         * Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
         *
         * @return int|null
         */
        public function getMaxConnections(): ?int
        {
            return $this->max_connections;
        }

        /**
         * Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
         *
         * @return string[]|null
         */
        public function getAllowedUpdates(): ?array
        {
            return $this->allowed_updates;
        }

        /**
         * @inheritDoc
         */
        public function toArray(): array
        {
            return [
                'url' => $this->url,
                'has_custom_certificate' => $this->has_custom_certificate,
                'pending_update_count' => $this->pending_update_count,
                'ip_address' => $this->ip_address,
                'last_error_date' => $this->last_error_date,
                'last_error_message' => $this->last_error_message,
                'last_synchronization_error_date' => $this->last_synchronization_error_date,
                'max_connections' => $this->max_connections,
                'allowed_updates' => $this->allowed_updates,
            ];
        }

        /**
         * @inheritDoc
         */
        public static function fromArray(?array $data): ?WebhookInfo
        {
            if($data === null)
            {
                return null;
            }

            $object = new self();
            $object->url = $data['url'] ?? null;
            $object->has_custom_certificate = $data['has_custom_certificate'] ?? false;
            $object->pending_update_count = $data['pending_update_count'] ?? false;
            $object->ip_address = $data['ip_address'] ?? null;
            $object->last_error_date = $data['last_error_date'] ?? null;
            $object->last_error_message = $data['last_error_message'] ?? null;
            $object->last_synchronization_error_date = $data['last_synchronization_error_date'] ?? null;
            $object->max_connections = $data['max_connections'] ?? null;
            $object->allowed_updates = $data['allowed_updates'] ?? null;

            return $object;
        }
    }