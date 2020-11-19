<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
    protected $table = 'eps';

    public $timestamps = false;
    
    
    public $fillable = [
        'nomEps',        
        'telEps',        
    ];

    public static $rules = [
        'nomEps' => 'required',
        'telEps' => 'required',
    ];

    public function empleados()
	{
		return $this->hasMany(Empleados::class);
	}
}
