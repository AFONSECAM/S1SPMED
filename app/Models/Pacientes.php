<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    protected $table = "pacientes";

    public $timestamps = false;

    protected $fillable = [
        "ciuRes",
        "dirRes",
        "eCivil",
        "mailPac",
        "fecNac",
        "genero",
        "nIdPac",
        "pApe",
        "pNom",
        "regimen",
        "rh",
        "sApe",
        "sNom",
        "telPac",
        "eps_id",
        "tipoId_id"        
    ];

    protected $dates = ['fecNac'];

    public static $rules = [

    ];

    public function tId(){
        return $this->belongsTo('App\Models\TiposId');
    }

    public function eps(){
        return $this->belongsTo('App\Models\Eps');
    }

}
