<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'user_email',
        'user_nama',
        'user_telepon',
        'user_alamat',
        'user_password',
        'user_saldo',
        'user_poin'
    ];
    public function cart(){
        return $this->hasMany(cart::class, 'user_id','id');
    }
    public function addons(){
        return $this->hasMany(addon::class, 'id_user','id');
    }
}
