<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="admins";
    protected $primaryKey="id";
    protected $fillable=[
        'admin_email',
        'admin_nama',
        'admin_telepon',
        'admin_password',
    ];
}
