<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:3|max:99',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Ürün Kategori başlığını giriniz',
            'title.max'                 => 'Ürün Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Ürün Kategori başlığı en fazla 3 karakter olabilir',
        ];
    }
}
