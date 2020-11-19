<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use DataTables;

use App\Models\TiposId;

class TiposIdController extends Controller
{
    public function index(){
        return view('empresa.tiposid.index');
    }


    public function listar(Request $request){
        $tiposid = TiposId::all();        
        
        return Datatables::of($tiposid)
            ->addColumn("editar", function ($tipoId) {
                return '<a href="/empresa/tiposid/editar/'.$tipoId->id.'" class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>';
            })
            ->rawColumns(['editar'])
            ->make(true);
            
    }
    public function create(){
        return view('empresa.tiposid.create');
    }

    public function store(Request $request) {
        //$request->validate(TiposId::$rules);
        $input = $request->all();
        try {
            TiposId::create([
                "tipoId"=>$input["tipo"],
                "nomTipo"=>$input["nombreTipo"]
            ]);
            Flash::success("Se registro el tipo de identificación");
            return redirect("/empresa/tiposid");
        } catch (Exception $e) {
            Flash::error($e.getMessage());
            return redirect("/empresa/tiposid/guardar");
        }
    }

    public function edit($id){
        $tipoId = TiposId::where('id', $id)->first();
        if($tipoId == null){
            Flash::error("Tipo de identificación no encontrada");
            return redirect("/empresa/tiposid");
        }
        return view("empresa.tiposid.edit", compact("tipoId"));
    }


    public function update(Request $request) {
        //$request->validate(TiposId::rules);
        $input = $request->all();
        try {
            $tipoId = TiposId::where('id', $input["id"]);
            if($tipoId == null){
                Flash::error("Tipo de identificación no encontrado");
                return redirect("/empresa/tiposid");
            }

            $tipoId->update([
                "tipoId"=>$input["tipo"],
                "nomTipo"=>$input{"nombreTipo"}
            ]);
            $mensaje ="Se modificó el tipo de identificación";
            Flash::overlay($mensaje, "Modificación exitosa");
            return redirect("/empresa/tiposid");
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/tiposid");
        }
    }
}
