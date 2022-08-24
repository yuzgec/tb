<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslatorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:translators,title,'.$this->id,
            'image'                 => 'image|max:2048|mimes:jpg,jpeg,png,gif',
            'gallery.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Çevirmen başlığını giriniz',
            'title.max'                 => 'Çevirmen başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Çevirmen başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Çevirmen başlığı daha önce eklenmiş',

            'image.max'                 => 'Resim boyutu en yüksek 2048kb(2mb) olmalıdır',
            'image.mimes'               => 'Resim formatı jpg,jpeg,png,gif olmalıdır',
            'image.image'               => 'Resim formatı uygun değildir.',

            'gallery.*.max'             => 'Resim boyutu en yüksek 2048kb(2mb) olmalıdır',
            'gallery.*.mimes'           => 'Resim formatı jpg,jpeg,png,gif olmalıdır',
            'gallery.*.image'           => 'Resim formatı uygun değildir.',

        ];
    }
}
