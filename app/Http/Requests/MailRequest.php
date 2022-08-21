<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email_address'                 => 'email|unique:mail_subcribes,email_address,'.$this->id,
         ];
    }

    public function messages()
    {
        return [
            'email_address.email'               => 'Geçerli bir email adresi giriniz',
            'email_address.unique'              => 'Email adresi daha önce eklenmiş',
        ];
    }
}
