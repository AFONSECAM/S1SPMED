<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;

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
        $fecha = $citas->fecha;                
        if($citas == null){
            Flash::error("Error al cargar la información");
            return redirect("/consulta");
        }
        return view("consulta.consulta", compact("citas","fecha"));
    }

    public function consulta(){
        return view('consulta.consulta');
    }
}
