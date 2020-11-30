<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_piel extends Model
{
    protected $table = 'hc_exa_piel';
    public $timestamps = false;

    protected $fillable = [
        'alopecia',
        'ampolla',
        'atrofia',
        'costra',
        'descripcion',
        'despig',
        'escama',
        'esclerosis',
        'escoriacion',
        'fisura',
        'habon',
        'liquen',
        'macula',
        'nodulo',
        'papula',
        'placa',
        'pustula',
        'querato',
        'quiste',
        'sinAlte',
        'tumor',
        'ulcera',
        'vesicula',
        'cita_id'
    ];
}
