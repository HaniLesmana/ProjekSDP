<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="kategoris";
    protected $fillable=[
        'kategori_nama',
    ];

    public function barangs(){
        return $this->hasMany(barang::class, 'barang_kategori','id');
    }
}
