<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtransTopup extends Model
{
    use HasFactory;
    protected $table = "dtranstpwd";
    //protected $primaryKey = "htranstpwd_id";
    // protected $fillable = ["htranstpwd_id","user_id", "htranstpwd_tanggal", "htranstpwd_total", "htranstpwd_tipe", "htranstpwd_status"];

    public function dh_trans()
    {
        return $this->belongsTo(htransTopup::class, 'htranstpwd_id', 'htranstpwd_id');
    }
}
