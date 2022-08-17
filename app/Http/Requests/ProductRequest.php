<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'                 => 'required|min:6|max:99|unique:products,title,'.$this->id,
            'category.*'            => 'required',
            'sku'                   => 'required',
            'price'                 => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'image'                 => 'image|max:2048|mimes:jpg,jpeg,png,gif',
            'gallery.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => 'Ürün başlığını giriniz',
            'title.max'                 => 'Ürün başlığı en fazla 99 karakter olabilir',
            'title.min'                 => 'Ürün başlığı en fazla 6 karakter olabilir',
            'title.unique'              => 'Ürün başlığı daha önce eklenmiş',
            'price.required'            => 'Fiyat Alanı Zorunludur',
            'price.reqex'               => 'Fiyat Alanı Ugun Değil Örn:1.90',
            'sku.required'              => 'Stok Kodu Zorunludur',
            'category.required'         => 'Ürün Kategori seçimi zorunludur.',
            'image.max'                 => 'Resim boyutu en yüksek 2048kb(2mb) olmalıdır',
            'image.mimes'               => 'Resim formatı jpg,jpeg,png,gif olmalıdır',
            'image.image'               => 'Resim formatı uygun değildir.',

            'gallery.*.max'             => 'Resim boyutu en yüksek 2048kb(2mb) olmalıdır',
            'gallery.*.mimes'           => 'Resim formatı jpg,jpeg,png,gif olmalıdır',
            'gallery.*.image'           => 'Resim formatı uygun değildir.',

        ];
    }
}
