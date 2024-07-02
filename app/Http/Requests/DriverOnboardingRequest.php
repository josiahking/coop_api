<?php

namespace App\Http\Requests;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;

class DriverOnboardingRequest extends FormRequest
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
            'driver_id' => ['required', 'unique:drivers_profile,driver_id'],
            'phone_number' => ['required', new Phone],
            'date_of_birth' => ['required', 'date'],
            'zip_code' => ['required', 'digits_between:5,6'],
            'address' => ['required'],
            'emergency_contact_name' => ['required'],
            'emergency_contact_phone' => ['required', new Phone],
            'dmv_license' => ['required'],
            'dmv_license_exp_date' => ['required', 'date'],
            'tlc_license' => ['required'],
            'tlc_license_exp_date' => ['required', 'date'],
            'vehicle_make' => ['required', 'alpha'],
            'vehicle_model' => ['required', 'alpha'],
            'vehicle_class' => ['required'],
            'vehicle_registration_exp_date' => ['required', 'date'],
            'vehicle_plate_number' => ['required'],
            'seat_capacity' => ['required', 'max:7'],
            'seat_belt' => ['required', 'max:7'],
            'luggage_capacity' => ['required', 'max:10'],
            'insurance_company' => ['required'],
            'insurer_policy_number' => ['required', 'integer'],
            'insurance_exp_date' => ['required', 'date'],
        ];
    }
}
