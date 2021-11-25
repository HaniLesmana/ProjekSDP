<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class htransTopup extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "htranstpwds";
    protected $primaryKey = "htranstpwd_id";
    protected $fillable = ["htranstpwd_id","user_id", "htranstpwd_tanggal", "htranstpwd_total", "htranstpwd_tipe", "htranstpwd_status"];
    public $timestamps = true;

    public function hd_trans()
    {
        return $this->hasMany(dtransTopup::class, 'htranstpwd_id', 'htranstpwd_id');
    }

}
