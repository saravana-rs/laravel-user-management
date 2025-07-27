<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->user() ? $this->user()->id : null;
        $isRegistration = $this->routeIs('register');
        $passwordRule = $isRegistration ? ['required'] : ['nullable'];

        return [
            // Basic Information
            'user_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($userId)
            ],
            'mobile' => ['required', 'regex:/^\d{10}$/'],
            'dob' => ['required', 'date'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'password' => array_merge($passwordRule, ['confirmed', Password::min(6)]),

            // Home Address (address1)
            'address1.door_street' => ['required', 'string'],
            'address1.city' => ['required', 'string'],
            'address1.landmark' => ['nullable', 'string'],
            'address1.state' => ['required', 'string'],
            'address1.country' => ['required', 'string'],
            'address1.primary' => ['sometimes', 'boolean'],

            // Work Address (address2)
            'address2.door_street' => ['nullable', 'string'],
            'address2.city' => ['nullable', 'string'],
            'address2.landmark' => ['nullable', 'string'],
            'address2.state' => ['nullable', 'string'],
            'address2.country' => ['nullable', 'string'],
            'address2.primary' => ['sometimes', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.regex' => 'The mobile number must be exactly 10 digits.',
            'address1.door_street.required' => 'The door/street field is required for home address.',
            'address1.city.required' => 'The city field is required for home address.',
            'address1.state.required' => 'The state field is required for home address.',
            'address1.country.required' => 'The country field is required for home address.',
        ];
    }

    public function prepareForValidation()
    {
        // For compatibility with both array and dot notation in views
        if ($this->has('home_door_street')) {
            $this->merge([
                'address1' => [
                    'door_street' => $this->home_door_street,
                    'city' => $this->home_city,
                    'landmark' => $this->home_landmark,
                    'state' => $this->home_state,
                    'country' => $this->home_country,
                    'primary' => $this->home_primary ?? false,
                ],
                'address2' => [
                    'door_street' => $this->work_door_street,
                    'city' => $this->work_city,
                    'landmark' => $this->work_landmark,
                    'state' => $this->work_state,
                    'country' => $this->work_country,
                    'primary' => $this->work_primary ?? false,
                ]
            ]);
        }
    }
}