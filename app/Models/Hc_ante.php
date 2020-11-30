<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_ante extends Model
{
    protected $table = 'hc_ante';
    public $timestamps = false;

    protected $fillable = [
        'alergi',
        'anteFam',
        'farma',
        'gineco',
        'pato',
        'quirur',
        'toxi',
        'trauma',
        'cita_id'
    ];
}
