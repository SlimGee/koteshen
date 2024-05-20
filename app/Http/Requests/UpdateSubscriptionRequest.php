<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('subscription'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'interval' => 'required|numeric',
            'interval_unit' => 'required|in:days,weeks,months,years',
            'ends_at' => [
                'required',
                'string',  // Ensure it's a string value
                function ($attribute, $value, $fail) {
                    if ($value !== 'indef') {
                        try {
                            $parsedDate = Carbon::parse($value);
                            if ($parsedDate->lessThanOrEqualTo(Carbon::tomorrow())) {
                                $fail('The ' . $attribute . ' must be a date after tomorrow.');
                            }
                        } catch (\Exception $e) {
                            $fail('The ' . $attribute . ' is not a valid date format.');
                        }
                    }
                },
            ],
        ];
    }
}
