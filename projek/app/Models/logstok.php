<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class logstok extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="logstoks";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'barang_id',
        'jumlah',
    ];
}
