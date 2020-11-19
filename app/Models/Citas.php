<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table = 'citas';

    public $timestamps = false;
    
    
    public $fillable = [
        "descripcion",
        "fecha",
        "hora_inicio",
        "hora_final",        
        "acompanante_id",
        "empleado_id",
        "paciente_id",
        "sede_id"          
    ];
    protected $dates = ['fecha','hora_inicio','hora_final'];

    public static $rules = [
        'nomCar' => 'required',
        'salCar' => 'required',
    ];

    public function empleado()
	{
		return $this->belongsTo('App\Models\Empleados');
    }
    
    public function paciente(){
        return $this->belongsTo('App\Models\Pacientes');
    }

    public function sede(){
        return $this->belongsTo('App\Models\Sedes');
    }
}
