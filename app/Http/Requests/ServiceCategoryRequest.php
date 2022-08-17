<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:service_categories,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Hizmet Kategori başlığını giriniz',
            'title.max'                 => 'Hizmet Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Hizmet Kategori başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Hizmet Kategori başlığı daha önce eklenmiş',
        ];
    }
}
