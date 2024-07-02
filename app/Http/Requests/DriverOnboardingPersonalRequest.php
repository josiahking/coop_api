<?php

namespace App\Http\Requests;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class DriverOnboardingPersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone_number' => ['required', new Phone],
            'date_of_birth' => ['required', 'date'],
            'zip_code' => ['required', 'digits_between:5,6'],
            'address' => ['required'],
            'emergency_contact_name' => ['required'],
            'emergency_contact_phone' => ['required', new Phone],
        ];
    }
}
