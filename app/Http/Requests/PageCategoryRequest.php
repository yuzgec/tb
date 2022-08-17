<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:page_categories,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Sayfa Kategori başlığını giriniz',
            'title.max'                 => 'Sayfa Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Sayfa Kategori başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Sayfa Kategori başlığı daha önce eklenmiş',
        ];
    }
}
