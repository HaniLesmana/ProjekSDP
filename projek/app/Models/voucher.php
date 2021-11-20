<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps=true;
    protected $fillable=[
        'voucher_nama',
        'voucher_harga',
        'voucher_potongan',
        'voucher_masaberlaku'
    ];
}
