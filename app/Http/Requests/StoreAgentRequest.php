<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAgentRequest extends FormRequest
{
    public function authorize()
    {
        // Only allow admins (use admin guard)
        return auth()->guard('admin')->check();
    }

    public function rules()
    {
        // Determine if this is an update and obtain the current user's id from route parameters.
        // We support routes that pass either 'id' or 'agent' as the parameter name.
        $agentId = $this->route('id') ?? $this->route('agent') ?? null;

        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                $agentId ? Rule::unique('users', 'email')->ignore($agentId) : 'unique:users,email',
            ],
            'mobile' => [
                'required',
                'numeric',
                'digits_between:6,10',
                $agentId ? Rule::unique('users', 'mobile')->ignore($agentId) : 'unique:users,mobile',
            ],
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
