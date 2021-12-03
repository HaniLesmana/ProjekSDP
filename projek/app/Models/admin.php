<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Authenticable
{
    use HasFactory;
    use SoftDeletes;

    protected $table="admins";
    protected $primaryKey="id";
    protected $fillable=[
        'admin_email',
        'admin_nama',
        'admin_saldo',
        'admin_telepon',
        'admin_password',
    ];
}
