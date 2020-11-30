<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_identificacion extends Model
{
    protected $table = 'hc_identificacion';
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'hora',
        'paciente_id',
        'acompanante_id',
        'cita_id'
    ];
}
