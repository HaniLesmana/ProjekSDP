<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "vouchers";
    public $timestamps=true;
    protected $primaryKey="id";
    public $incrementing=true;
    protected $fillable=[
        'voucher_nama',
        'voucher_harga',
        'voucher_potongan'
    ];
    public function user_voucher(){
        return $this->hasOne(user_voucher::class, 'voucher_id','id');
    }
}
