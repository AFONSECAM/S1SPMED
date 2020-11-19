<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    protected $table = "gastos";

    public $timestamps = false;

    protected $fillable = [
        "concepto",
        "fecGasto",
        "forPago",
        "valor",
        "empleado_id"        
    ];

    protected $dates = ['fecGasto'];

    public static $rules = [

    ];

    public function empleado(){
        return $this->belongsTo('App\Models\Empleados');
    }
}
