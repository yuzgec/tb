<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'har_kod'                => 'required|numeric|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'har_kod.required'           => 'Telefon alanı boş bırakılamaz',
            'har_kod.max'                => 'Telefon en fazla 11 karakter olabilir',
            'har_kod.digits'             => 'Telefon numaranız en az 10 karakter olabilir',

        ];
    }
}
