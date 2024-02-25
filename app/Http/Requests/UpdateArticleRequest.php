<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends StoreArticleRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(parent::rules(),[
            'title' => ['required','string','min:5','max:50',Rule::unique('articles')->ignore($this->article)],
            'thumbnail' => ['nullable','image','file'],
        ]);
    }
}
