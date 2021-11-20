<?php

namespace App\Rules;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Validation\Rule;
use App\Models\pegawai;
use App\Models\user;
use App\Models\admin;

use function PHPUnit\Framework\isEmpty;

class cek_uniq implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($jenis)
    {
        // $this->data=$data;
        $this->jenis=$jenis;
        // $this->nik=$nik;
        // $this->data=$data;
        // $this->data1=$data1;
        // $this->data2=$data2;
        // $this->table=$table;
        // $this->type=$type;
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
        $unik=true;
        if($this->jenis == 'nik'){
            if(pegawai::where('pegawai_nik',$value)->exists()){
                $unik = false;
            }

        }
        else{
            if(user::where('user_email',$value)->exists()){
                $unik = false;
            }
            if(pegawai::where('pegawai_email',$value)->exists()){
                $unik = false;
            }
            if(admin::where('admin_email',$value)->exists()){
                $unik = false;
            }
        }

        return $unik;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute ini sudah ada';
    }
}
