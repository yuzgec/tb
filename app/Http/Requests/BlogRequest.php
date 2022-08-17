<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:blog,title,'.$this->id,
            'category'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Blog başlığını giriniz',
            'title.max'                 => 'Blog başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Blog başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Blog başlığı daha önce eklenmiş',
            'category.required'         => 'Blog Kategori seçimi zorunludur.'
        ];
    }
}
