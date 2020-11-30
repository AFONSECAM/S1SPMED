<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $table = 'sedes';

    public $fillable = [        
        "dirSede",
        "nomSede",        
        "telSede"        
    ];

    public static $rules = [
        'nomSede' => 'required',
        'dirSede' => 'required',
        'telSede' => 'required',        
    ];
}
