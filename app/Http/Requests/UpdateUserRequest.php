<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','min:3','max:15',Rule::unique('users')->ignore($this->user)],
            'email' => ['required','email',Rule::unique('users')->ignore($this->user)],
            'role' => ['exists:roles,name','nullable']
        ];
    }
}
