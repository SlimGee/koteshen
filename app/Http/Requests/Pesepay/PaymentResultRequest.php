<?php

namespace App\Http\Requests\Pesepay;

use App\Models\Pesepay\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class PaymentResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Transaction::where('reference', $this->referenceNumber)
            ->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'referenceNumber' => ['required', 'string'],
            'dateOfTransaction' => ['required', 'numeric'],
            'applicationId' => ['required', 'string'],
            'applicationName' => ['required', 'string'],
            'amountDetails' => ['required', 'array'],
            'amountDetails.amount' => ['required', 'numeric'],
            'amountDetails.currencyCode' => ['required', 'string'],
            'amountDetails.defaultCurrencyAmount' => ['required', 'numeric'],
            'amountDetails.defaultCurrencyCode' => ['required', 'string'],
            'amountDetails.transactionServiceFee' => ['required', 'numeric'],
            'amountDetails.customerPayableAmount' => ['required', 'numeric'],
            'amountDetails.totalTransactionAmount' => ['required', 'numeric'],
            'amountDetails.merchantAmount' => ['required', 'numeric'],
            'amountDetails.formattedMerchantAmount' => ['required', 'string'],
            'reasonForPayment' => ['required', 'string'],
            'transactionStatus' => ['required', 'string', 'in:' . implode(',', $this->statuses())],
            'transactionStatusDescription' => ['required', 'string'],
            'resultUrl' => ['required', 'url'],
            'returnUrl' => ['required', 'url'],
            'pollUrl' => ['nullable', 'url'],
            'transcationMetadata' => ['required', 'array'],
            'transactionMetada.applicationId' => ['sometimes', 'nullable', 'string'],
            'transactionMetada.returnUrl' => ['sometimes', 'nullable', 'string'],
        ];
    }

    /**
     * Get the statuses.
     *
     * @return array<int, string>
     */
    public function statuses(): array
    {
        return [
            'AUTHORIZATION_FAILED',
            'CANCELLED',
            'CLOSED',
            'CLOSED_PERIOD_ELAPSED',
            'DECLINED',
            'ERROR',
            'FAILED',
            'INITIATED',
            'INSUFFICIENT_FUNDS',
            'PARTIALLY_PAID',
            'PENDING',
            'PROCESSING',
            'REVERSED',
            'SERVICE_UNAVAILABLE',
            'SUCCESS',
            'TERMINATED',
            'TIME_OUT',
        ];
    }
}
