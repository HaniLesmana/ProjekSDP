<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtransTopup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "dtranstpwd";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'htranstpwd_id',
        'dtranstpwd_nominal',
        'dtranstpwd_jumlah'
    ];

    public function dh_trans()
    {
        return $this->belongsTo(htransTopup::class, 'htranstpwd_id', 'htranstpwd_id');
    }
}
