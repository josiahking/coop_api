<?php

namespace App\Http\Requests\Auth;

use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RiderRegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:riders',
            'password' => ['required', 'confirmed', Password::min(8)
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(3)],
            'phone_number' => ['nullable', new Phone],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.unique' => "Email address already exists.",
        ];
    }
}
