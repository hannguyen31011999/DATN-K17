<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Model\User;

class CheckEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $user = User::where('email',$value)->get();
        if($user->isEmpty())
            return false;
        return true;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tài khoản email không tồn tại';
    }
}
