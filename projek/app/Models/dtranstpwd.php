<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtranstpwd extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="dtranstpwd";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'htranstpwd_id',
        'htranstpwd_nominal',
        'htranstpwd_jumlah',
    ];
}
