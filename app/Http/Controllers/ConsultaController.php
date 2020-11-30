<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Citas;
use App\Models\Hc;
use App\Models\Hc_anamnesis;
use App\Models\Hc_ante;
use App\Models\Hc_diag;
use App\Models\Hc_exa_abdo;
use App\Models\Hc_exa_cardio;
use App\Models\Hc_exa_genito;
use App\Models\Hc_exa_neuro;
use App\Models\Hc_exa_organos;
use App\Models\Hc_exa_osteo;
use App\Models\Hc_exa_piel;
use App\Models\Hc_exa_respi;
use App\Models\Hc_exa_signos;
use App\Models\Hc_identificacion;
use App\Models\Hc_medica;
use App\Models\Hc_plan;
use App\Models\Hc_result;
use App\Models\Hc_sistemas;
use App\Models\Insumos;

use Flash;
use DataTables;

class ConsultaController extends Controller
{
    public function index(){
        return view('consulta.index');
    }

    public function listar(){
        $citas = Citas::all();                      
        return Datatables::of($citas)
        ->editColumn("fecha", function($cita){
            return $cita->fecha->format('d-m-Y');
        })
        ->editColumn("hora_inicio", function($cita){
            return $cita->hora_inicio->toTimeString();
        })
        ->editColumn("hora_final", function($cita){
            return $cita->hora_final->toTimeString();
        })
        ->editColumn("empleado_id", function($cita){
            $responsable = $cita->empleado->pNom;
            $responsable.= " " . $cita->empleado->pApe;
            return $responsable;            
        })
        ->editColumn("paciente_id", function($cita){
            $paciente = $cita->paciente->pNom;
            $paciente.= " " . $cita->paciente->pApe;
            return $paciente;            
        })
        ->editColumn("sede_id", function($cita){
            $sede = $cita->sede->nomSede;            
            return $sede;            
        })
        ->addColumn("accion", function ($cita) {
            return '<a href="/consulta/consulta/'.$cita->id.'" class="btn btn-sm btn-primary"><i class="fas fa-check"></i></a>';
        })
        ->rawColumns(['accion'])
        ->make(true);            
    }    

    public function inicioConsulta($idCita){
        $citas = Citas::where('id', $idCita)->first();
        $insumos = Insumos::all();
        $fecha = $citas->fecha;                
        if($citas == null){
            Flash::error("Error al cargar la información");
            return redirect("/consulta");
        }
        return view("consulta.consulta", compact("citas","fecha", "insumos"));
    }


    public function guardarConsulta(Request $request){
        $input = $request->all();
        try {       
            Hc_identificacion::create([
                'fecha' => $input["fecha"],
                'hora' => $input["hora"],
                'paciente_id' => $input["pacienteId"],
                'acompanante_id' => $input["acompananteId"],
                'cita_id' => $input["citaId"]           
            ]);
            /* $hc_identificacion_id = Hc_identificacion::all()->last('id'); */
            Hc_anamnesis::create([
                "enfActual" => $input["enfActual"],
                "motivo" => $input["motivo"],
                "cita_id" => $input["citaId"]
            ]);
            /* $hc_anamnesis_id = Hc_anamnesis::all()->last('id'); */

            Hc_ante::create([
                'alergi' => $input["alergi"],
                'anteFam' => $input["anteFam"],
                'farma' => $input["farma"],
                'gineco' => $input["gineco"],
                'pato' => $input["pato"],
                'quirur' => $input["quirur"],
                'toxi' => $input["toxi"],
                'trauma' => $input["trauma"],
                'cita_id' => $input["citaId"]
            ]);   
            /* $hc_ante_id = Hc_ante::all()->last('id'); */
            Hc_sistemas::create([
                'sistema' => $input["sistema"],
                'obs' => $input["obsSistema"],
                'cita_id' => $input["citaId"]                
            ]);
            /* $hc_sistemas_id = Hc_sistemas::all()->last('id');  */
            Hc_exa_signos::create([
                'ta' => $input["ta"],
                'fc' => $input["fc"],
                'fr' => $input["fr"],
                'sat' => $input["sat"],
                'temp' => $input["temp"],
                'cita_id' => $input["citaId"]
            ]);
            /* $hc_exa_signos_id = Hc_exa_signos::all()->last('id'); */
            Hc_exa_organos::create([
                'boca' => $input["boca"],
                'bocaObs' => $input["bocaObs"],
                'nariz' => $input["nariz"],
                'narizObs' => $input["narizObs"],
                'oido' => $input["oido"],
                'oidoObs' => $input["oidoObs"],
                'ojo' => $input["ojo"],
                'ojoObs' => $input["ojoObs"],
                'sinAlte' => $input["sinAlteOrganos"],
                'cita_id' => $input["citaId"]
            ]);
            /* $hc_exa_organos_id =  Hc_exa_organos::all()->last('id'); */
            Hc_exa_neuro::create([
                'ansioso' => $input["ansioso"],
                'babinski' => $input["babinski"],
                'depresivo' => $input["depresivo"],
                'eutimico' => $input["eutimico"],
                'fondoOjo' => $input["fondoOjo"],
                'fondoOjoObs' => $input["fondoOjoObs"],
                'fzaMuscular' => $input["fzaMuscular"],
                'glassglow' => $input["glassglow"],
                'hemiparesia' => $input["hemiparesia"],
                'hemiplejia' => $input["hemiplejia"],
                'lassegue' => $input["lassegue"],
                'maniaco' => $input["maniaco"],
                'otro' => $input["otro"],
                'otroObs' => $input["otroObs"],
                'psicotico' => $input["psicotico"],
                'pupilas' => $input["pupilas"],
                'pupilasObs' => $input["pupilasObs"],
                'rigidezNuca' => $input["rigidezNuca"],
                'rot' => $input["rot"],
                'rotObs' => $input["rotObs"],
                'sinAlte' => $input["sinAlteNeuro"],
                'cita_id' => $input["citaId"]
            ]);
            /* $hc_exa_neuro_id = Hc_exa_neuro::all()->last('id'); */
            Hc_exa_respi::create([
                'crepitos' => $input["crepitos"],
                'crepitosObs' => $input["crepitosObs"],
                'estertores' => $input["estertores"],
                'estertoresObs' => $input["estertoresObs"],
                'fremito' => $input["fremito"],
                'fremitoObs' => $input["fremitoObs"],
                'percusion' => $input["percusion"],
                'percusionObs' => $input["percusionObs"],
                'roncus' => $input["roncus"],
                'roncusObs' => $input["roncusObs"],
                'sibilancias' => $input["sibilancias"],
                'sibilanciasObs' => $input["sibilanciasObs"],
                'sinAlte' => $input["sinAlteRespi"],
                'tirajes' => $input["tirajes"],
                'tirajesObs' => $input["tirajesObs"],
                'cita_id' => $input["citaId"]               
            ]);
            /* $hc_exa_respi_id = Hc_exa_respi::all()->last('id'); */
            Hc_exa_cardio::create([
                'arritmico' => $input["arritmico"],
                'arritmicoObs' => $input["arritmicoObs"],
                'edemas' => $input["edemas"],
                'edemasObs' => $input["edemasObs"],
                'inurgi' => $input["inurgi"],
                'inurgiObs' => $input["inurgiObs"],
                'otros' => $input["otros"],
                'otrosObs' => $input["otrosObs"],
                'pulsos' => $input["pulsos"],
                'pulsosObs' => $input["pulsosObs"],
                'sinAlte' => $input["sinAlteCardio"],
                'soplos' => $input["soplos"],
                'soplosObs' => $input["soplosObs"],
                'cita_id' => $input["citaId"]
            ]);
            /* $hc_exa_cardio_id = Hc_exa_cardio::all()->last('id'); */
            Hc_exa_abdo::create([
                'ascitis' => $input["ascitis"],
                'blumberg' => $input["blumberg"],
                'descripcion' => $input["descAbdo"],
                'distenido' => $input["distenido"],
                'dolor' => $input["dolor"],
                'espleno' => $input["espleno"],
                'hepato' => $input["hepato"],
                'hernia' => $input["hernia"],
                'masa' => $input["masa"],
                'perista' => $input["perista"],
                'rovsing' => $input["rovsing"],
                'sinAlte' => $input["sinAlteAbdo"],
                'cita_id' => $input["citaId"]
            ]); 
            /* $hc_exa_abdo_id = Hc_exa_abdo::all()->last('id'); */
            Hc_exa_piel::create([
                'alopecia' => $input['alopecia'],
                'ampolla' => $input['ampolla'],
                'atrofia' => $input['atrofia'],
                'costra' => $input['costra'],
                'descripcion' => $input['descPiel'],
                'despig' => $input['despig'],
                'escama' => $input['escama'],
                'esclerosis' => $input['esclerosis'],
                'escoriacion' => $input['escoriacion'],
                'fisura' => $input['fisura'],
                'habon' => $input['habon'],
                'liquen' => $input['liquen'],
                'macula' => $input['macula'],
                'nodulo' => $input['nodulo'],
                'papula' => $input['papula'],
                'placa' => $input['placa'],
                'pustula' => $input['pustula'],
                'querato' => $input['querato'],
                'quiste' => $input['quiste'],
                'sinAlte' => $input['sinAltePiel'],
                'tumor' => $input['tumor'],
                'ulcera' => $input['ulcera'],
                'vesicula' => $input['vesicula'],
                'cita_id' => $input['citaId']
            ]);
            /* $hc_exa_piel_id = Hc_exa_piel::all()->last('id'); */
            Hc_exa_osteo::create([
                'descripcion' => $input["descOsteo"],                
                'cita_id' => $input["citaId"]
            ]);
            /* $hc_exa_osteo_id = Hc_exa_osteo::all()->last('id'); */
            Hc_exa_genito::create([
                'descripcion' => $input["descGenito"],
                'sinAlte' => $input["sinAlte"],
                'cita_id' => $input["citaId"]
            ]);
            /* $hc_exa_genito_id = Hc_exa_genito::all()->last('id'); */  
            Hc_result::create([
                'descripcion' => $input["descResult"],                
                'cita_id' => $input["citaId"]                
            ]);
            /* $hc_result_id = Hc_result::all()->last('id'); */
            Hc_diag::create([
                'dx1' => $input["dx1"],
                'dx2' => $input["dx2"],
                'dx3' => $input["dx3"],
                'dx4' => $input["dx4"],
                'cita_id' => $input["citaId"]
            ]); 
            /* $hc_diag_id = Hc_diag::all()->last('id'); */
            Hc_plan::create([
                'descripcion' => $input["descPlan"],                
                'cita_id' => $input["citaId"]                
            ]);
            /* $hc_plan_id = Hc_plan::all()->last('id'); */
            Hc_medica::create([
                'dosis' => $input["dosis"],
                'tiempoTra' => $input["tiempoTra"],
                'viaAdmin' => $input["viaAdmin"],
                'insumos_id ' => $input["insumosId"],
                'cita_id' => $input["citaId"]                
            ]);
            /* $hc_medica_id = Hc_medica::all()->last('id'); */
            
            
           
            /* Consulta::create([
                'hc_identificacion_id' => $hc_identificacion_id,
                'hc_anamnesis_id' => $hc_anamnesis_id,
                'hc_ante_id' => $hc_ante_id,
                'hc_sistemas_id' => $hc_sistemas_id,
                'hc_exa_signos_id' => $hc_exa_signos_id,
                'hc_exa_organos_id' => $hc_exa_organos_id,
                'hc_exa_neuro_id' => $hc_exa_neuro_id,
                'hc_exa_respi_id' => $hc_exa_respi_id,
                'hc_exa_cardio_id' => $hc_exa_cardio_id,
                'hc_exa_abdo_id' => $hc_exa_abdo_id,
                'hc_exa_piel_id' => $hc_exa_piel_id,
                'hc_exa_osteo_id' => $hc_exa_osteo_id,
                'hc_exa_genito_id' => $hc_exa_genito_id,
                'hc_result_id' => $hc_result_id,
                'hc_diag_id' => $hc_diag_id,
                'hc_plan_id' => $hc_plan_id,
                'hc_medica_id' => $hc_medica_id,
                'cita_id' => $input["citaId"]
            ]);
            $consulta_id = Consulta::all()->last('id');
            Hc::create([
                'consulta_id' => $consulta_id,
                'paciente_id' => $input["pacienteId"]
            ]); */
            Flash::success("Se han guardado los datos de la consulta correctamente!");
            return redirect("/consulta");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/consulta");
        }
    }
}
