<?php

namespace App\Models;

use Database\Factories\PegawaiFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Authenticable
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
        'pegawai_saldo',
        'pegawai_deskripsi',
        'pegawai_photo'
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

    protected static function newFactory()
    {
        return PegawaiFactory::new();
    }
}
