<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc_diag extends Model
{
    protected $table = 'hc_diag';
    public $timestamps = false;

    protected $fillable = [
        'dx1',
        'dx2',
        'dx3',
        'dx4',
        'cita_id'
    ];
}
