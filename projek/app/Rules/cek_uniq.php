<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cek_uniq implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($data,$data1,$data2,$table,$nik,$type)
    {
        $this->nik=$nik;
        $this->data=$data;
        $this->data1=$data1;
        $this->data2=$data2;
        $this->table=$table;
        $this->type=$type;
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
        $ada=false;
        foreach ($this->data as $i => $v) {
            if($value==$this->data[$i][$this->table]&&$this->nik!=$this->data[$i]['nik']&&$this->type=="edit"){
                $ada=true;
            }
            else if($value==$this->data[$i][$this->table]&&$this->type=="add"){
                $ada=true;
            }
        }
        foreach ($this->data1 as $i => $v) {
            if($value==$this->data1[$i][$this->table]&&$this->nik!=$this->data1[$i]['nik']&&$this->type=="edit"){
                $ada=true;
            }
            else if($value==$this->data1[$i][$this->table]&&$this->type=="add"){
                $ada=true;
            }
        }
        foreach ($this->data2 as $i => $v) {
            if($value==$this->data2[$i][$this->table]&&$this->nik!=$this->data2[$i]['nik']&&$this->type=="edit"){
                $ada=true;
            }
            else if($value==$this->data2[$i][$this->table]&&$this->type=="add"){
                $ada=true;
            }
        }
        if($ada){
            return false;
        }
        else{
            return true;
        }
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
