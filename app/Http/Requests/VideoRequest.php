<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:video,title,'.$this->id,
            'video_url'             => 'required|max:11|min:11',
            'category'              => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Video başlığını giriniz',
            'title.max'                 => 'Video başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Video başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Video başlığı daha önce eklenmiş',
            'video_url.required'        => 'Video URL giriniz',
            'video_url.max'             => 'Video URL en fazla 11 karakter olabilir',
            'video_url.min'             => 'Video URL en fazla 11 karakter olabilir',
            'category.required'         => 'Video Kategori seçimi zorunludur.'
        ];
    }
}
