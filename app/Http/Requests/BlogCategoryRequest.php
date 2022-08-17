<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:blog_categories,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Blog Kategori başlığını giriniz',
            'title.max'                 => 'Blog Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Blog Kategori başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Blog Kategori başlığı daha önce eklenmiş',
        ];
    }
}
