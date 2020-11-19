<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public $timestamps = false;
    
    
    public $fillable = [
        'nomRol',                        
    ];

    public static $rules = [
        'nomRol' => 'required',        
    ];
}