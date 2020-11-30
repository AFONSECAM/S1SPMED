<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_genito extends Model
{
    protected $table = 'hc_exa_genito';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'sinAlte',
        'cita_id'
    ];
}
