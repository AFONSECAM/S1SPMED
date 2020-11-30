<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_abdo extends Model
{
    protected $table = 'hc_exa_abdo';    
    public $timestamps = false;

    protected $fillable = [
        'ascitis',
        'blumberg',
        'descripcion',
        'distenido',
        'dolor',
        'espleno',
        'hepato',
        'hernia',
        'masa',
        'perista',
        'rovsing',
        'sinAlte',
        'cita_id'
    ];
}
