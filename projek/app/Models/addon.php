<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class addon extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="addons";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'id_pegawai',
        'id_user',
        'id_barang',
        'jumlah',
    ];

    public function pegawai(){
        return $this->belongsTo(pegawai::class, 'id_pegawai','id');
    }
    public function user(){
        return $this->belongsTo(user::class, 'id_user','id');
    }
    public function barang(){
        return $this->belongsTo(barang::class, 'id_barang','id');
    }
}
