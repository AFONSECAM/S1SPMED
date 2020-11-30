<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hc extends Model
{
    protected $table = 'hc';

    public $timestamps = false;
    
    
    protected $fillable = [
        'consulta_id',        
        'paciente_id',        
    ];

    public static $rules = [        
    ];
}
