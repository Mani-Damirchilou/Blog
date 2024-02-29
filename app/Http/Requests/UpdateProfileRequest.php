<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateProfileRequest extends FormRequest
{

    public function authorize()
    {
        return $this->user()->email !== 'admin@admin';
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string',Rule::unique('users')->ignore($this->user()),'min:3','max:15'],
            'email' => ['required','email',Rule::unique('users')->ignore($this->user())],
            'password' => ['nullable',Password::default(),'string'],
            'profile' => ['file','nullable','image']
        ];
    }
}
