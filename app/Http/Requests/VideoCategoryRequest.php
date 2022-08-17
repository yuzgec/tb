<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:video_categories,title,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Video Kategori başlığını giriniz',
            'title.max'                 => 'Video Kategori başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Video Kategori başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Video Kategori başlığı daha önce eklenmiş',
        ];
    }
}
