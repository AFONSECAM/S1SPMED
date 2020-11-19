<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\Acompanantes;
use App\Models\TiposId;

class AcompanantesController extends Controller
{
    public function index($id){
        $pacienteId = $id;               
        return view("empresa.pacientes.acompanantes.index", compact("pacienteId"));        
    }

    public function listar($id){
        $acompanantes = Acompanantes::where('paciente_id', $id);        
        
        return Datatables::of($acompanantes)
        ->editColumn("nombre", function($acompanante){
            return $acompanante->pNom . " " . $acompanante->pNom;
        })
        ->editColumn("apellidos", function($acompanante){
            return $acompanante->pApe . " " . $acompanante->sApe;
        })
        ->editColumn("edad", function($acompanante){
            return $acompanante->edad . " años";
        })
        ->addColumn("editar", function ($acompanante) {
            return '<a href="/empresa/pacientes/acompanantes/editar/'.$acompanante->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>';
        })
        ->rawColumns(['editar', 'nombre', 'apellidos', 'edad'])
        ->make(true);            
    }

    public function create($id){
        $pacienteId = $id;
        $tiposId = TiposId::all(); 
        return view("empresa.pacientes.acompanantes.create", \compact("pacienteId", "tiposId"));
    }

    public function store(Request $request){
        $input = $request->all();
        try {
            Acompanantes::create([
                "edad" => $input["edad"],
                "mailAcom" => $input['email'],
                "nIdAcom" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "parPac" => $input['parentesco'],
                "pNom" => $input["primerNom"],
                "sApe" => $input["segundoApe"],
                "sNom" => $input["segundoNom"],
                "telAcom" => $input['telefono'],
                "tipoId_id" => $input["tipoId"],
                "paciente_id" => $input['paciente']                
            ]);
            Flash::success("Se ha registrado un nuevo acompañante");
            return redirect('/empresa/pacientes/acompanantes/' . $input['paciente']);
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect('/empresa/pacientes/acompanantes/' . $input['paciente']);
        }
    }
    
    public function edit($id){
        $tiposId = TiposId::all();         
        $acompanante = Acompanantes::where('id', $id)->first();        
        if($acompanante == null){
            Flash::error("Error al cargar la información para editarla");
            return redirect("/empresa/pacientes");
        }
        return view("empresa.pacientes.acompanantes.edit", \compact("acompanante","tiposId"));
    }

    public function update(Request $request){
        $input = $request->all();
        $acompanante = Acompanantes::where('id', $input["id"]);
        try {        
            if($acompanante == null){
                Flash::error("Se ha producido un error al generar la vista");
                return redirect("/empresa/pacientes");
            }
            $acompanante->update([
                "edad" => $input["edad"],
                "mailAcom" => $input['email'],
                "nIdAcom" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "parPac" => $input['parentesco'],
                "pNom" => $input["primerNom"],
                "sApe" => $input["segundoApe"],
                "sNom" => $input["segundoNom"],
                "telAcom" => $input['telefono'],
                "tipoId_id" => $input["tipoId"],                                                
            ]);
            Flash::success("Se ha modificado el acompañante " . $input["primerNom"] . " " . $input["segundoNom"] . " " . $input["primerApe"] . " " . $input["segundoApe"] . " con éxito");
            return redirect("/empresa/pacientes/acompanantes/".$input['id']);
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/pacientes");
        }
    }
}
