<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtranssewa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="dtranssewa";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'pegawai_id',
        'dSewa_durasi',
        'dSewa_harga',
        'hSewa_id'
    ];
    public function pegawai(){
        return $this->belongsTo(pegawai::class, 'pegawai_id','id');
    }
}
