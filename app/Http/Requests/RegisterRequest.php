<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:App\Models\User,email',
            'type' => [
                'required',
                Rule::in([User::ADMIN_TYPE, User::USER_TYPE])
            ],
            'password' => 'required|confirmed'
        ];
    }
}
