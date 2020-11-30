<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_anamnesis extends Model
{
    protected $table = 'hc_anamnesis';
    public $timestamps = false;

    protected $fillable = [
        'enfActual',
        'motivo',
        'cita_id'
    ];
}
