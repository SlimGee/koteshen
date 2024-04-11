<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'number' => 'nullable|string',
            'notes' => 'nullable|string',
            'due_at' => 'required_if|due_in:custom|nullable|date',
            'due_in' => 'require|string|7 days,14 days,30 days,60 days,90 days,custom',
        ];
    }
}
