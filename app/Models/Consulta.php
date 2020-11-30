<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consulta';
    public $timestamps = false;

    protected $fillable = [
        'hc_identificacion_id',
        'hc_anamnesis_id',
        'hc_ante_id',
        'hc_sistemas_id',
        'hc_exa_signos_id',
        'hc_exa_organos_id',
        'hc_exa_neuro_id',
        'hc_exa_respi_id',
        'hc_exa_cardio_id',
        'hc_exa_abdo_id',
        'hc_exa_piel_id',
        'hc_exa_osteo_id',
        'hc_exa_genito_id',
        'hc_result_id',
        'hc_diag_id',
        'hc_plan_id',
        'hc_medica_id',
        'cita_id'
    ];
}
