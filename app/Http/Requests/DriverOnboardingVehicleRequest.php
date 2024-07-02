<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverOnboardingVehicleRequest extends FormRequest
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
            'vehicle_make' => ['required', 'alpha'],
            'vehicle_model' => ['required', 'alpha'],
            'vehicle_class' => ['required'],
            'vehicle_registration_number' => ['required'],
            'vehicle_plate_number' => ['required'],
            'seat_capacity' => ['required', 'digits_between:3,7'],
            'seat_belt' => ['required', 'digits_between:2,7'],
            'lugage_capacity' => ['required', 'digits_between:2,10'],
            'insurance_company' => ['required'],
            'insurer_policy_number' => ['required', 'integer'],
            'insurance_exp_date' => ['required', 'date'],
        ];
    }
}
