<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:project,title,'.$this->id,
            'category'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Proje başlığını giriniz',
            'title.max'                 => 'Proje başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Proje başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Proje başlığı daha önce eklenmiş',
            'category.required'         => 'Proje Kategori seçimi zorunludur.'
        ];
    }
}
