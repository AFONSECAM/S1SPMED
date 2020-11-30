<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_signos extends Model
{
    protected $table = 'hc_exa_signos';
    public $timestamps = false;

    protected $fillable = [
        'ta',
        'fc',
        'fr',
        'sat',
        'temp',
        'cita_id'
    ];
}
