<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = "empleados";

    public $timestamps = false;

    protected $fillable = [
        "ciuRes",
        "dirRes",
        "eCivil",
        "mailEmp",
        "fecIng",
        "fecNac",
        "genero",
        "nIdEmp",
        "pApe",
        "pNom",
        "rh",
        "sApe",        
        "sNom",        
        "telEmp",
        "arl_id",
        "cargo_id",
        "eps_id",
        "tipoId_id",
        "estado"                                
    ];

    public static $rules = [

    ];

    public function tId(){
        return $this->belongsTo('App\Models\TiposId');
    }

    public function cargo(){
        return $this->belongsTo('App\Models\Cargos');
    }

    public function eps(){
        return $this->belongsTo('App\Models\Eps');
    }

    public function arl(){
        return $this->belongsTo('App\Models\Arl');
    }

    public function gastos(){
        return $this->hasMany('App\Models\Gastos');
    }
    
    public function recaudos(){
        return $this->hasMany('App\Models\Recaudos');
    }

    
}
