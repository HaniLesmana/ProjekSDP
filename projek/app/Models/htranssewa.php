<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class htranssewa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="htranssewa";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'user_id',
        'hBarang_id',
        'hSewa_total',
        'voucher_id'
    ];

}
