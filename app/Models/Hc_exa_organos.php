<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_organos extends Model
{
    protected $table = 'hc_exa_organos';
    public $timestamps = false;

    protected $fillable = [
        'boca',
        'bocaObs',
        'nariz',
        'narizObs',
        'oido',
        'oidoObs',
        'ojo',
        'ojoObs',
        'sinAlte',
        'cita_id'
    ];
}
