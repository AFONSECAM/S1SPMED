<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_medica extends Model
{
    protected $table = 'hc_medica';
    public $timestamps = false;

    protected $fillable = [
        'dosis',
        'tiempoTra',
        'viaAdmin',
        'insumos_id',
        'cita_id'
    ];
}
