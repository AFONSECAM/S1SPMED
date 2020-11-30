<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_sistemas extends Model
{
    protected $table = 'hc_sistemas';
    public $timestamps = false;

    protected $fillable = [
        'sistema',
        'obs',
        'cita_id'
    ];
}
