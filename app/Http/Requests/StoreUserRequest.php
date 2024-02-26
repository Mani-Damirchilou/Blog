<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','min:3','max:15','unique:users,name'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string',Password::default()],
            'role' => ['exists:roles,name','nullable']
        ];
    }
}
