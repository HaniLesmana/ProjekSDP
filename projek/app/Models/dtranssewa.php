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
        'dSewa_tanggal',
        'dSewa_harga',
        'dSewa_alamat',
        'hSewa_id'
    ];
    public function pegawai(){
        return $this->belongsTo(pegawai::class, 'pegawai_id','id');
    }
    public function htranssewa(){
        return $this->belongsTo(htranssewa::class, 'hSewa_id','id');
    }
    public function logsaldo(){
        return $this->hasOne(logsaldo::class, 'dtrans_id','id');
    }
}
