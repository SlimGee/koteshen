<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Invoice::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'currency_id' => 'required|exists:currencies,id',
            'items' => 'required|array',
            'items.*.name' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'number' => 'nullable|string',
            'notes' => 'nullable|string',
            'due_at' => 'required_if:due_in,custom|nullable|date',
            'due_in' => 'required|string|in:now,7 days,14 days,30 days,60 days,90 days,custom',
            'discount' => 'sometimes|nullable|numeric|min:0|max:100',
            'tax_ids' => 'sometimes|array',
            'tax_ids.*' => 'required|exists:taxes,id',
        ];
    }

    public function withoutOtherFields(): array
    {
        return $this->safe()->except('items', 'due_at', 'tax_ids', 'discount');
    }
}
