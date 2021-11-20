<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="carts";
    protected $fillable=[
        'user_id',
        'pegawai_id',
    ];
    public function user(){
        return $this->belongsTo(user::class, 'user_id','id');
    }
    public function pegawai(){
        return $this->belongsTo(pegawai::class, 'pegawai_id','id');
    }
}
