<?php

namespace App\Http\Requests;

use App\Enum\ClientType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('client'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required|string|max:255|in:' . collect(ClientType::cases())->pluck('value')->join(','),
            'name' => 'required_if:type,' . ClientType::ORGANIZATION->value . '|nullable|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'currency_id' => 'required|numeric|exists:currencies,id',
            'website' => 'nullable|url|max:255',
            'notes' => 'nullable|string',
            'email' => 'required|email|max:255|unique:clients,email,' . $this->route('client')->id,
            'phone' => 'required|phone:mobile',
            'phone_country' => 'required_with:phone',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ];
    }
}
