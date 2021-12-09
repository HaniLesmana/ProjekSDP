<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class user extends Authenticable
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

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
        'user_poin',
        'user_photo'
    ];
    public function cart(){
        return $this->hasMany(cart::class, 'user_id','id');
    }
    public function addons(){
        return $this->hasMany(addon::class, 'id_user','id');
    }
    public function htranssewa(){
        return $this->hasMany(htranssewa::class, 'user_id','id');
    }
    public function user_voucher(){
        return $this->hasMany(user_voucher::class, 'user_id','id');
    }


    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function routeNotificationForMail($notification){
        return $this->user_email;
    }
}
