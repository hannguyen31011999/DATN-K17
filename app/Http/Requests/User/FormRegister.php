<?php

namespace App\Http\Requests\user;

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
            'fullname'=>'required|regex:[^[a-zA-Z]]|max:124',
            'email'=>'required|email|unique:user,email|max:124',
            'password'=>'required|min:6|max:124',
            'phone'=>'required|numeric|regex:/(0)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập tên đầy đủ',
            'fullname.regex'=>'Họ tên có kí tự đặc biệt',
            'fullname.max'=>'Họ tên quá dài',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email tồn tại',
            'email.max'=>'Email quá dài',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có 6 kí tự',
            'password.max'=>'Mật khẩu quá dài',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.regex'=>'Số điện thoại sai định dạng',
            'phone.numeric'=>'Số điện thoại phải là số',
            'phone.max'=>'Số điện thoại 10 số'
        ];
    }
}
