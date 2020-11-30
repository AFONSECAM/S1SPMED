<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_cardio extends Model
{
    protected $table = 'hc_exa_cardio';
    public $timestamps = false;

    protected $fillable = [
        'arritmico',
        'arritmicoObs',
        'edemas',
        'edemasObs',
        'inurgi',
        'inurgiObs',
        'otros',
        'otrosObs',
        'pulsos',
        'pulsosObs',
        'sinAlte',
        'soplos',
        'soplosObs',
        'cita_id'
    ];
}
