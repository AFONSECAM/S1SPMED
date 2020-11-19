<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'cargos';

    public $timestamps = false;
    
    
    public $fillable = [
        'nomCar',        
        'salCar',        
    ];

    public static $rules = [
        'nomCar' => 'required',
        'salCar' => 'required',
    ];

    public function empleados()
	{
		return $this->hasMany(Empleados::class);
	}
}
