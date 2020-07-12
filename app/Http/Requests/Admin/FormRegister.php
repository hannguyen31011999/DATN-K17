<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FormRegister extends FormRequest
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
            'fullname'=>'required|regex:[^[a-zA-Z]]',
            'email'=>'required|email|unique:user,email',
            'password'=>'required|min:6',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập tên đầy đủ',
            'fullname.regex'=>'Fullname có kí tự đặc biệt',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email tồn tại',
            'password.required'=>'Vui lòng nhập password',
            'password.regex'=>'Password phải có 6 kí tự',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Mobile phải bắt đầu bằng số 0 và mobile có có 10 số',
            'phone.numeric'=>'Mobile phải là số',
        ];
    }
}
