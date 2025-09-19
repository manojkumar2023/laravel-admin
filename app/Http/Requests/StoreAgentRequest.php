<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgentRequest extends FormRequest
{
    public function authorize()
    {
        // Only allow admins (use admin guard)
        return auth()->guard('admin')->check();
    }

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'mobile' => ['required', 'numeric', 'digits_between:6,10', 'unique:users,mobile'],
            'address' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.digits_between' => 'Mobile must be numeric and up to 10 digits.',
        ];
    }
}
