<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Models\Sedes;
use App\Exports\SedesExport;

class SedesController extends Controller
{
    public function index(){
        return view('empresa.sedes.index');
    }

    public function listar(Request $request){
        if(Auth::user()->rol->nomRol=='Administrador') //se valida el tipo de usuario
            $sedes = Sedes::all();
        else{
            $sedes = Sedes::all()->where('estado',1);    
        }     
        return Datatables::of($sedes)
/*             ->editColumn("estado", function($sede){
                return $sede->estado == 1 ? "<span class='badge badge-success'> Activo" : "<span class='badge badge-danger'>Inactivo";
            }) */
            ->addColumn('editar', function ($sede) {
                if($sede->estado == 1){
                    $estado = '<a href="/empresa/sedes/cambiarestado/'.$sede->id.'/0" class="btn btn-sm btn-danger" title="Inactivar"><i class="fa fa-trash"></i></a>';
                }else{
                    $estado = '<a href="/empresa/sedes/cambiarestado/'.$sede->id.'/1" class="btn btn-sm btn-success" title="Activar"><i class="fa fa-check"></i></a>';
                }
                return '<a href="/empresa/sedes/editar/'.$sede->id.'" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>'.$estado;
            })
            ->rawColumns(['editar'])                        
            ->make(true);
    }
    
    public function create(){
        return view('empresa.sedes.create');
    }

    public function store(Request $request){
        //$request->validate(Sedes::$rules);
        $input = $request->all();
        try {
            Sedes::create([
                "nomSede" => $input["nombreSede"],
                "dirSede" => $input["direccionSede"], 
                "telSede" => $input["telefonoSede"],
                "estado"=>1, 
            ]);

            Flash::success("Se registró una nueva sede");
            return redirect("/empresa/sedes");
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/sedes/crear");
        }
    }

    public function edit($id){        
        $sede = Sedes::where('id', $id)->first();
        if($sede == null){
            Flash::error("Sede no encontrada");
            return redirect("/empresa/sedes");
        }
        return view("empresa.sedes.edit", compact("sede"));
    }

    public function update(Request $request){
        //$request->validate(Sedes::$rules);
        $input = $request->all();
        try {            

            $sede = Sedes::where('id',$input["id"]);
            if($sede == null){
                Flash::error("Sede no encontrada");
                return redirect("/empresa/sedes");
            }

            $sede->update([
                "nomSede" => $input["nombreSede"],
                "dirSede" => $input["direccionSede"], 
                "telSede" => $input["telefonoSede"],
                "estado" => $input["ddlestado"],                
            ]);

            Flash::success("Se modificó la sede");
            return redirect("/empresa/sedes");
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/sedes");
        }
    }

    public function updateState($id, $estado){
        $sede = Sedes::where('id', $id)->first();
        if($sede == null){
            Flash::error("Sede no encontrada");
            return redirect("/empresa/sedes");
        }
        try {
            $sede->update(["estado"=>$estado]);
            Flash::success("Se modificó el estado de la sede");
            return redirect("/empresa/sedes");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/sedes");
        }        
    }

    public function exportar(Request $request){
        $input = $request->all();
        $sedes = Sedes::all();
        if(count($sedes) > 0){
            if(isset($input['pdf'])){
                return $this->generar_pdf($sedes);
            }else if(isset($input['excel'])){
                return $this->generar_excel($sedes);
            }else{
                Flash::error("Error al generar el documento! :(");
                return \redirect("/empresa/sedes");
            }
        }else{
            return \redirect("/empresa/sedes");
        }
    }

    private function generar_pdf($sedes){
        $pdf = PDF::loadView('pdf.sedes', compact('sedes'))
        ->setPaper('a4', 'landscape');
        return $pdf->stream('sedes.pdf');
    }

    private function generar_excel($sedes){
        $sedes = new SedesExport($sedes);
        return Excel::download($sedes, 'sedes.xlsx');
    }
}
