<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class FormCheckout extends FormRequest
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
            'name'=>'required|regex:[^[a-zA-Z]]|max:124',
            'email'=>'required|email|max:124',
            'address'=>'required|regex:[^[a-zA-Z0-9]]|max:124',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/|max:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên đầy đủ',
            'name.regex'=>'Họ tên không được có kí tự đặc biệt',
            'name.max'=>'Họ tên quá dài',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.max'=>'Email quá dài',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Mobile phải bắt đầu bằng số 0 và mobile có có 10 số',
            'phone.numeric'=>'Mobile phải là số',
            'phone.max'=>'Số điện thoại 10 số',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'address.regex'=>'Địa chỉ không được có kí tự đặc biệt',
            'address.max'=>'Địa chỉ quá dài',
        ];
    }
}
