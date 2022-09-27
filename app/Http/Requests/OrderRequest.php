<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'                 => 'required|min:3|max:30|regex:/^[a-zA-ZşŞıİçÇöÖüÜĞğ]+$/',
            'surname'              => 'required|min:2|max:30|regex:/^[a-zA-ZşŞıİçÇöÖüÜĞğ]+$/',
            'phone'                => 'required|numeric|digits_between:10,11',
            'address'              => 'required|min:25',
            'email'                => 'required|email',
            'province'             => 'required',
            'city'                 => 'required|regex:/^[a-zA-ZşŞıİçÇöÖüÜĞğ]+$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required'            => 'İsim alanı boş bırakılamaz',
            'name.max'                 => 'İsim en fazla 30 karakter olabilir',
            'name.min'                 => 'İsim en az 3 karakter olabilir',
            'name.regex'               => 'Geçerli bir isim giriniz',

            'surname.required'         => 'Soyisim alanı boş bırakılamaz',
            'surname.max'              => 'Soyisim en fazla 30 karakter olabilir',
            'surname.min'              => 'Soyisim en az 2 karakter olabilir',
            'surname.regex'            =>  'Geçerli bir soyisim giriniz',

            'phone.required'           => 'Telefon alanı boş bırakılamaz',
            'phone.numeric'            => 'Telefon sadece rakamlardan oluşabilir',
            'phone.digits_between'     => 'Geçerli bir telefon numarası giriniz',

            'address.required'         => 'Adres alanı boş bırakılamaz',
            'address.min'              => 'Adres en az 25 karakterden oluşmalıdır',

            'email.email'              => 'Geçerli bir email giriniz',
            'email.required'           => 'Email alanı boş bırakılamaz',

            'province.required'        => 'İl alanı boş bırakılamaz',
            'city.required'            => 'İlçe alanı boş bırakılamaz',
            'city.regex'               => 'Geçerli bir ilçe adı giriniz',


        ];
    }
}
