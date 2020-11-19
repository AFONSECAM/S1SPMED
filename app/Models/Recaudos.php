<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recaudos extends Model
{
    protected $table = "recaudos";

    public $timestamps = false;

    protected $fillable = [
        "concep",
        "fecReca",        
        "forPago",        
        "valor",
        "empleado_id"
    ];

    protected $dates = ['fecReca'];

    public function empleado(){
        return $this->belongsTo('App\Models\Empleados');
    }

    public static $rules = [

    ];
}
