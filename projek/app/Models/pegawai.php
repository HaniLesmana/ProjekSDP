<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="pegawais";

    protected $fillable=[
        'pegawai_nik',
        'pegawai_email',
        'pegawai_nama',
        'pegawai_telepon',
        'pegawai_alamat',
        'pegawai_password',
        'pegawai_jasa',
        'pegawai_saldo'
    ];

    public function inCart(){
        return $this->hasMany(cart::class, 'pegawai_id','id');
    }
    public function addons(){
        return $this->hasMany(addon::class, 'id_pegawai','id');
    }
    public function dtranssewa(){
        return $this->hasOne(dtranssewa::class, 'pegawai_id','id');
    }
}
