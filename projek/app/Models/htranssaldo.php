<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class htranssaldo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="htranssaldo";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'saldo_jenis',
        'saldo_jumlah',
        'saldo_status'
    ];
}
