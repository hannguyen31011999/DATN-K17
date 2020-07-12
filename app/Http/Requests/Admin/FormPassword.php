<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckPassword;
class FormPassword extends FormRequest
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
            'password'=>['required',new CheckPassword],
            'new_password'=>'required|min:6',
            'ent_password'=>'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'Vui lòng nhập mật khẩu',
            'new_password.required'=>'Vui lòng nhập mật khẩu mới',
            'new_password.min'=>'Mật khẩu ít hơn 6 kí tự',
            'ent_password.required'=>'Vui lòng nhập lại mật khẩu mới',
            'ent_password.same'=>'Mật khẩu không trùng khớp',
        ];
    }
}
