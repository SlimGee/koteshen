<?php

namespace App\Pesepay;

use App\Models\Pesepay\Transaction;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class Pesepay
{
    /**
     * Issue intergrationKey from your Pesepay dashboard
     *
     * @var string
     */
    protected $intergrationKey;

    /**
     * Issue encryptionKey from your Pesepay dashboard
     *
     * @var string
     */
    protected $encryptionKey;

    /**
     * Pesepay APi base url
     *
     * @var string
     */
    protected $baseUrl = 'https://api.pesepay.com/api/payments-engine';

    protected $returnUrl;

    protected $resultUrl;

    protected $redirectUrl;

    protected $pollUrl;

    protected $reference;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->setKeys();
        // $this->setBaseUrl();
    }

    public function setKeys(): void
    {
        $this->intergrationKey = config('pesepay.integration_key');
        $this->encryptionKey = config('pesepay.encryption_key');
    }

    public function configureUrls(?string $returnUrl = null, ?string $resultUrl = null): void
    {
        $this->returnUrl = $returnUrl ?? config('pesepay.return_url');
        $this->resultUrl = $resultUrl ?? config('pesepay.result_url');
    }

    public function setBaseUrl(): void
    {
        $this->baseUrl = config('pesepay.base_url');
    }

    public function getPaymentUrl(array $data)
    {
        $encrypted = $this->encryptData($this->structure($data));

        $response = Http::withHeaders([
            'authorization' => $this->intergrationKey,
            'content-type' => 'application/json',
        ])->post($this->baseUrl . '/v1/payments/initiate', ['payload' => $encrypted]);

        throw_if($response->status() >= 400, new RuntimeException('Failed to initiate payment'));

        $decrypted = $this->decryptData($response->json()['payload']);

        $this->redirectUrl = $decrypted['redirectUrl'];
        $this->pollUrl = $decrypted['pollUrl'];
        $this->reference = $decrypted['referenceNumber'];

        Transaction::create([
            'reference_number' => $decrypted['referenceNumber'],
            'poll_url' => $decrypted['pollUrl'],
            'redirect_url' => $decrypted['redirectUrl'],
            'metadata' => $data['metadata'] ?? [],
        ]);

        return $this;
    }

    public function verifyTransaction(string $reference): array|bool
    {
        $transaction = Transaction::where('reference_number', $reference)->first();

        if (!$transaction) {
            return false;
        }

        $response = Http::withHeaders([
            'authorization' => $this->intergrationKey,
            'content-type' => 'application/json',
        ])->get($transaction->poll_url);

        if ($response->status() >= 400) {
            return false;
        }

        return array_merge(['metadata' => $transaction->metadata], $this->decryptData($response->json()['payload']));
    }

    public function makePayment(array $data)
    {
        // wip
    }

    public function getPollUrl()
    {
        return $this->pollUrl;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function redirectNow()
    {
        return redirect($this->redirectUrl);
    }

    public function getActiveCurrencies()
    {
        return Http::withHeaders([
            'authorization' => $this->intergrationKey,
            'content-type' => 'application/json',
        ])->get($this->baseUrl . '/v1/currencies/active')->json();
    }

    public function structure($data)
    {
        return [
            'amountDetails' => [
                'amount' => $data['amount'],
                'currencyCode' => $data['currency'],
            ],
            'reasonForPayment' => $data['reason'],
            'resultUrl' => $data['result_url'] ?? $this->resultUrl,
            'returnUrl' => $data['return_url'] ?? $this->resultUrl,
        ];
    }

    public function encryptData(array $data): string
    {
        $data = json_encode($data);
        $iv = substr($this->encryptionKey, 0, 16);

        return openssl_encrypt($data, 'aes-256-cbc', $this->encryptionKey, 0, $iv);
    }

    public function decryptData(string $encryptedData): array
    {
        $iv = substr($this->encryptionKey, 0, 16);
        $decrypted = openssl_decrypt($encryptedData, 'aes-256-cbc', $this->encryptionKey, 0, $iv);

        return json_decode($decrypted, true);
    }
}
