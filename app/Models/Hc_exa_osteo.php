<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_exa_osteo extends Model
{
    protected $table = 'hc_exa_osteo';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'cita_id'
    ];
}
