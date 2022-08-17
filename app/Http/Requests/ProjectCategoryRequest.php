<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:project_categories,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Proje Kategori başlığını giriniz',
            'title.max'                 => 'Proje Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Proje Kategori başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Proje Kategori başlığı daha önce eklenmiş',
        ];
    }
}
