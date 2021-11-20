<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'pegawai_id',
        'user_id',
        'chat_isi',
        'chat_sender'
    ];
}
