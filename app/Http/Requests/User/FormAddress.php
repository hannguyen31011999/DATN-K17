<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class FormAddress extends FormRequest
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
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/',
            'address'=>'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Mobile phải bắt đầu bằng số 0 và mobile có có 10 số',
            'phone.numeric'=>'Mobile phải là số',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'address.max'=>'Địa chỉ quá dài'
        ];
    }
}
