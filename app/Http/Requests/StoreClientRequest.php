<?php

namespace App\Http\Requests;

use App\Enum\ClientType;
use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Client::class);
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
            'email' => 'required|email|max:255|unique:clients,email',
            'phone' => 'required|phone:mobile',
            'phone_country' => 'required_with:phone',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'city.required' => 'Please enter a city',
            'address.required' => 'Please provide an address',
            'phone.required' => 'Please enter a valid phone number',
            'phone.phone' => 'Please enter a valid phone number.',
            'email.required' => 'Please enter a valid email address',
            'first_name.required' => 'Please provide contact person first name',
            'last_name.required' => 'Please provide contact person last name',
            'name.required_if' => "If this is an organization please provide it's name",
        ];
    }
}
