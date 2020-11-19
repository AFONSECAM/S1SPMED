<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acompanantes extends Model
{
    protected $table = "acompanantes";

    public $timestamps = false;

    protected $fillable = [
        "edad", 
        "mailAcom",       
        "nIdAcom",
        "pApe",
        "parPac",
        "pNom",
        "sApe",
        "sNom",                
        "telAcom",                            
        "tipoId_id",
        "paciente_id",                             
    ];

    public function paciente(){
        return $this->belongsTo('App\Models\Pacientes');
    }

    public function tipoid(){
        return $this->belongsTo('App\Models\TiposId');
    }
}
