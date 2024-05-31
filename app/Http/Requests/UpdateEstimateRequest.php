<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstimateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('estimate'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'number' => 'sometimes|nullable|string',
            'currency_id' => 'required|exists:currencies,id',
            'client_id' => 'required|exists:clients,id',
            'notes' => 'sometimes|nullable|string',
            'items' => 'required|array',
            'items.*.name' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'expires_at' => 'required_if:due_in,custom|nullable|date',
            'expires_in' => 'required|string|in:now,7 days,14 days,30 days,60 days,90 days,custom',
            'description' => 'required|string',
            'discount' => 'sometimes|nullable|numeric|min:0|max:100',
            'tax_ids' => 'sometimes|array',
            'tax_ids.*' => 'required|exists:taxes,id',
        ];
    }

    public function estimateParams(): array
    {
        return $this->safe()->except('tax_ids', 'discount', 'items', 'expires_at');
    }
}
