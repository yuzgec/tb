<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                   => 'required|min:2|max:99|unique:publishers,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Yayınevi başlığını giriniz',
            'title.max'                 => 'Yayınevi başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Yayınevi başlığı en az 2 karakter olabilir',
            'title.unique'              => 'Yayınevi Kodu daha önce eklenmiş',
        ];
    }
}
