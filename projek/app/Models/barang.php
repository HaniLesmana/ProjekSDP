<?php

namespace App\Models;

use Database\Factories\BarangFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="barangs";
    protected $primaryKey="id";
    public $incrementing=false;
    public $timestamps=true;
    protected $fillable=[
        'barang_kategori',
        'barang_nama',
        'barang_harga',
        'barang_stok',
    ];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'barang_kategori','id');
    }
    public function addon(){
        return $this->hasMany(addon::class, 'id_barang','id');
    }
    public function dtransbarang(){
        return $this->hasOne(dtransbarang::class, 'barang_id','id');
    }

    protected static function newFactory()
    {
        return BarangFactory::new();
    }
}
