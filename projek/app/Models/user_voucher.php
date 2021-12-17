<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class user_voucher extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "user_vouchers";
    public $timestamps=true;
    protected $primaryKey="id";
    public $incrementing=true;
    protected $fillable=[
        'user_id',
        'voucher_id',
    ];
    public function user(){
        return $this->belongsTo(user::class, 'user_id','id');
    }
    public function voucher(){
        return $this->belongsTo(voucher::class, 'voucher_id','id');
    }
}

