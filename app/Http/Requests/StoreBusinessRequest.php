<?php

namespace App\Http\Requests;

use App\Models\Business;
use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Business::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|phone:phone_country',
            'phone_country' => 'required_with:phone',
            'industry' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.phone' => 'Please enter a valid phone number.',
            'name.required' => 'We need to know the name of your business.',
            'address.required' => 'We need the address of your business.',
            'city.required' => 'We need the city of your business.',
        ];
    }
}
