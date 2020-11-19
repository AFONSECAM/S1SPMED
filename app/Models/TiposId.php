<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiposId extends Model
{
    protected $table = 'tiposId';

    public $timestamps = false;
    
    
    public $fillable = [
        'tipo',
        'nomTipo',       
    ];

    public static $rules = [
        'tipoId' => 'required',
        'nomTipo' => 'required',
    ];

}
