<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'q'                 => 'required|min:3|max:99',
        ];
    }

    public function messages()
    {
        return [
            'q.required'            => 'Arama kelimesi girilmesi zorunludur',
            'q.max'                 => 'Arama kelimesi en fazla 99 karakter olabilir',
            'q.min'                 => 'Arama kelimesi en az 3 karakter olabilir',
        ];
    }
}
