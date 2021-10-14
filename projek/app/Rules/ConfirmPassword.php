<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ConfirmPassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($password)
    {
        $this->password = $password;
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
        $cek = false;
        if($this->password == $value){
            $cek = true;
        }
        return $cek;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password and confirm is not equal';
    }
}
