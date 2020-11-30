<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_result extends Model
{
    protected $table = 'hc_result';
    public $timestamps = false;

    protected $fillable = [
        'descripcion',
        'cita_id'
    ];
}
