<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:gallery,title,'.$this->id,
            'category'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Galeri başlığını giriniz',
            'title.max'                 => 'Galeri başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Galeri başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Galeri başlığı daha önce eklenmiş',
            'category.required'         => 'Galeri Kategori seçimi zorunludur.'
        ];
    }
}
