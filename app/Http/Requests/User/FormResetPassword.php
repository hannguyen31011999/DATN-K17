<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckCode;
class FormResetPassword extends FormRequest
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
            'password'=>'required|min:6|max:124',
            'ent_password'=>'required|same:password',
            'code'=> ['required',new CheckCode],
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'Vui lòng nhập mật khẩu mới',
            'password.min'=>'Mật khẩu ít hơn 6 kí tự',
            'password.max'=>'Mật khẩu quá dài',
            'ent_password.required'=>'Vui lòng nhập lại mật khẩu mới',
            'ent_password.same'=>'Mật khẩu không trùng khớp',
            'code.required'=>'Vui lòng nhập mã xác nhận',
        ];
    }

}
