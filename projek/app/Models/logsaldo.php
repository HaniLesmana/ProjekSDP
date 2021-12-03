<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class logsaldo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="logsaldos";

    public function dtranssewa(){
        return $this->belongsTo(dtranssewa::class, 'dtrans_id','id');
    }

}
