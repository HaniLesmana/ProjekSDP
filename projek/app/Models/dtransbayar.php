<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dtransbayar extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="dtransbayar";
    protected $primaryKey="id";
    public $incrementing=true;
    public $timestamps=true;
    protected $fillable=[
        'hBayar_id',
        'dBayar_id'
    ];
}
