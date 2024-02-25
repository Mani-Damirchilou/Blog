<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string','min:5','max:50','unique:articles,title'],
            'category_id' => ['nullable','exists:categories,id'],
            'content' => ['required','string','min:10','max:65000'],
            'thumbnail' => ['required','image','file'],
            'tags' => ['array'],
            'tags.*' => ['exists:tags,id'],

        ];
    }
}
