<?php

namespace App\Rules;
use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\Validation\Rule;

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
            $pegawai = DB::select("select * from pegawai where pegawai_status = 1 and pegawai_nik = '$value'");
            if($pegawai != null){
                $unik = false;
            }

        }
        else{
            $user = DB::select("select * from user where user_status = 1 and user_email = '$value'");
            $pegawai = DB::select("select * from pegawai where pegawai_status = 1 and pegawai_email = '$value'");
            $admin = DB::select("select * from admin where admin_status = 1 and admin_email = '$value'");

            if($user != null){
                $unik = false;
            }
            if($pegawai!=null){
                $unik = false;
            }
            if($admin != null){
                $unik = false;
            }
        }

        return $unik;

        // foreach ($user as $u) {
        //     if($u->username == $t){
        //         $ada=true;
        //     }
        //     else if($value==$this->data[$i][$this->table]&&$this->type=="add"){
        //         $ada=true;
        //     }
        // }
        // foreach ($this->data1 as $i => $v) {
        //     if($user->data1[$i][$this->table]&&$this->nik!=$this->data1[$i]['nik']&&$this->type=="edit"){
        //         $ada=true;
        //     }
        //     else if($value==$this->data1[$i][$this->table]&&$this->type=="add"){
        //         $ada=true;
        //     }
        // }
        // foreach ($user as $i => $v) {
        //     if($value==$this->data2[$i][$this->table]&&$this->nik!=$this->data2[$i]['nik']&&$this->type=="edit"){
        //         $ada=true;
        //     }
        //     else if($value==$this->data2[$i][$this->table]&&$this->type=="add"){
        //         $ada=true;
        //     }
        // }
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
