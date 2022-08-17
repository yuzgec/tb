<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:faq,title,'.$this->id,
            'category'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'S.S.S başlığını giriniz',
            'title.max'                 => 'S.S.S başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'S.S.S başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'S.S.S başlığı daha önce eklenmiş',
            'category.required'         => 'S.S.S Kategori seçimi zorunludur.'
        ];
    }
}
