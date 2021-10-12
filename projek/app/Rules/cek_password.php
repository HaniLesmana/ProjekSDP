<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cek_password implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data,$email,$tipe)
    {
        $this->data = $data;
        $this->email = $email;
        $this->tipe = $tipe;
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
        if($this->tipe == "user"){
            foreach ($this->data as $dat) {
                if($dat->user_email == $this->email && $dat->user_password == $value){
                    return true;
                }
            }
        }
        else if($this->tipe == "pegawai"){
            foreach ($this->data as $dat) {
                if($dat->pegawai_email == $this->email && $dat->pegawai_password == $value){
                    return true;
                }
            }
        }
        else{
            foreach ($this->data as $dat) {
                if($dat->admin_email == $this->email && $dat->admin_password == $value){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
