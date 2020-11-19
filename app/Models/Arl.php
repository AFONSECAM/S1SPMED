<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arl extends Model
{
    protected $table = 'arl';

    public $timestamps = false;
    
    
    protected $fillable = [
        'nomArl',        
        'telArl',        
    ];

    public static $rules = [        
    ];

    public function empleados()
	{
		return $this->hasMany(Empleados::class);
	}
}