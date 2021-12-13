<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtransbarang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="dtransbarang";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'barang_id',
        'barang_jumlah',
        'dSewa_id'
    ];

    public function barang(){
        return $this->belongsTo(barang::class, 'barang_id','id');
    }
    public function dtranssewa(){
        return $this->belongsTo(dtranssewa::class, 'dSewa_id','id');
    }
}
