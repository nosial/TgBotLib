<?php

namespace TgBotLib\Objects\Telegram;

use TgBotLib\Interfaces\ObjectTypeInterface;

class RefundedPayment implements ObjectTypeInterface
{
    private string $currency;
    private int $total_amount;
    private string $invoice_payload;
    private string $telegram_payment_charge_id;
    private ?string $provider_payment_charge_id;

    /**
     * Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always “XTR”
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Total refunded price in the smallest units of the currency (integer, not float/double). For example,
     * for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the
     * number of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    /**
     * Bot-specified invoice payload
     *
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    /**
     * Telegram payment identifier
     *
     * @return string
     */
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegram_payment_charge_id;
    }

    /**
     * Optional. Provider payment identifier
     *
     * @return string
     */
    public function getProviderPaymentChargeId(): string
    {
        return $this->provider_payment_charge_id;
    }

    /**
     * @inheritDoc
     */
   public function toArray(): array
    {
        return [
            'currency' => $this->currency,
            'total_amount' => $this->total_amount,
            'invoice_payload' => $this->invoice_payload,
            'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
            'provider_payment_charge_id' => $this->provider_payment_charge_id,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $data): ObjectTypeInterface
    {
        $object = new self();

        $object->currency = $data['currency'];
        $object->total_amount = $data['total_amount'];
        $object->invoice_payload = $data['invoice_payload'];
        $object->telegram_payment_charge_id = $data['telegram_payment_charge_id'];
        $object->provider_payment_charge_id = $data['provider_payment_charge_id'] ?? null;

        return $object;
    }
}