<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99,'.$this->id,
            'category'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Ekip başlığını giriniz',
            'title.max'                 => 'Ekip başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Ekip başlığı en fazla 6 karakter olabilir',
            'category.required'         => 'Ekip Kategori seçimi zorunludur.'
        ];
    }
}
