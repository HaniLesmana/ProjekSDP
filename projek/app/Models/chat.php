<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class chat extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="chats";

    protected $fillable=[
        'chat_sender',
        'chat_destination',
        'chat_text',
    ];

    function user_sender(){
        return $this->belongsTo(user::class, 'chat_sender','id');
    }

    function user_destination(){
        return $this->belongsTo(pegawai::class, 'chat_destination','id');
    }

    function pegawai_sender(){
        return $this->belongsTo(pegawai::class, 'chat_sender','id');
    }

    function pegawai_destination(){
        return $this->belongsTo(user::class, 'chat_destination','id');
    }
}
