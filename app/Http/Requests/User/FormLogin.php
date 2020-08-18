<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class FormLogin extends FormRequest
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
            'email'=>'required|email|max:124',
            'password'=>'required|max:124',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'email.max'=>'Email quá dài',
            'password.required'=>'Vui lòng nhập password',
            'password.max'=>'Mật khẩu quá dài'
        ];
    }
}
