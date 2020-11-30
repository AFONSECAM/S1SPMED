<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_respi extends Model
{
    protected $table = 'hc_exa_respi';
    public $timestamps = false;

    protected $fillable = [
        'crepitos',
        'crepitosObs',
        'estertores',
        'estertoresObs',
        'fremito',
        'fremitoObs',
        'percusion',
        'percusionObs',
        'roncus',
        'roncusObs',
        'sibilancias',
        'sibilanciasObs',
        'sinAlte',
        'tirajes',
        'tirajesObs',
        'cita_id'
    ];
}
