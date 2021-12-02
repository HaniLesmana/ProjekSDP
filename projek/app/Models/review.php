<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="reviews";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'pegawai_id',
        'rating',
        'review'
    ];
    public function user(){
        return $this->belongsTo(user::class, 'user_id','id');
    }
    public function pegawai(){
        return $this->belongsTo(pegawai::class, 'pegawai_id','id');
    }
}
