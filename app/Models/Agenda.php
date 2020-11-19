<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = "agenda";

    protected $fillable = [
        "descripcion",
        "fecha",
        "hora_inicio",
        "hora_final",        
        "acompanante_id",
        "empleado_id",
        "paciente_id",                        
    ];
}
