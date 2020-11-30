<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_neuro extends Model
{
    protected $table = 'hc_exa_neuro';
    public $timestamps = false;

    protected $fillable = [
        'ansioso',
        'babinski',
        'depresivo',
        'eutimico',
        'fondoOjo',
        'fondoOjoObs',
        'fzaMuscular',
        'glassglow',
        'hemiparesia',
        'hemiplejia',
        'lassegue',
        'maniaco',
        'otro',
        'otroObs',
        'psicotico',
        'pupilas',
        'pupilasObs',
        'rigidezNuca',
        'rot',
        'rotObs',
        'sinAlte',
        'cita_id'
    ];
}
