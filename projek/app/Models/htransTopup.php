<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class htransTopup extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "htranstpwds";
    protected $primaryKey = "htranstpwd_id";
    protected $fillable = ["htranstpwd_id","user_id", "htranstpwd_tanggal", "htranstpwd_total", "htranstpwd_tipe", "htranstpwd_status","token_payment","status_payment"];
    public $timestamps = true;
    public $incrementing = true;
    public const CHALLENGE = 'changllenge';
    public const SETLE = 'setlement';
    public const PENDING = 'pending';
    public const DENY = 'deny';
    public const EXPIRE = 'expire';
    public const CANCEL = 'cancel';
    public const SUCCESS = 'success';

    public function hd_trans()
    {
        return $this->hasMany(dtransTopup::class, 'htranstpwd_id', 'htranstpwd_id');
    }

    public function user(){
        return $this->belongsTo(user::class, 'user_id', 'id');
    }

}
