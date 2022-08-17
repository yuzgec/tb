<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:gallery_categories,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Galeri Kategori başlığını giriniz',
            'title.max'                 => 'Galeri Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Galeri Kategori başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Galeri Kategori başlığı daha önce eklenmiş',
        ];
    }
}
