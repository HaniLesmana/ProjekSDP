<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class htransbarang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="htransbarang";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'pegawai_id',
        'hBarang_total'
    ];
}
