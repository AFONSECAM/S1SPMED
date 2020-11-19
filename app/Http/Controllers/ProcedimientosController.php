<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Models\User;
use App\Models\Procedimientos;
use App\Exports\ProcedimientosExport;

class ProcedimientosController extends Controller
{
    public function index(){
        return view('empresa.procedimientos.index');
    }

    public function listar(){        
        if(Auth::user()->cargo=='Administrador') //se valida el tipo de usuario
            $procedimientos = Procedimientos::all();
        else{
            $procedimientos = Procedimientos::all()->where('estado',1);    
        }            
        return Datatables::of($procedimientos)
        ->editColumn("estado", function($procedimiento){
            return $procedimiento->estado == 1 ? "<span class='badge badge-success'> Activo" : "<span class='badge badge-danger'>Inactivo";
        }) 
        ->editColumn("valProc", function($procedimiento){
            return '$'. number_format($procedimiento->valProc, 0);
        }) 
        ->addColumn('editar', function($procedimiento){
            if($procedimiento->estado == 1){
                $estado = '<a href="/empresa/procedimientos/cambiarestado/'.$procedimiento->id.'/0" class="btn btn-sm btn-danger" title="Desactivar"><i class="fa fa-trash"></i></a>';
            }else{
                $estado = '<a href="/empresa/procedimientos/cambiarestado/'.$procedimiento->id.'/1" class="btn btn-sm btn-success" title="Activar"><i class="fa fa-check"></i> </a>';
            }
            return '<a href="/empresa/procedimientos/editar/'.$procedimiento->id.'" class="btn btn-sm btn-primary" title="Editar"><i class="fas fa-pen"></i></a>'.$estado;
        }) 
        ->rawColumns(['estado', 'editar'])     
        ->make(true);
    }
    

    public function create(){
        return view('empresa.procedimientos.create');        
    }

    public function save(Request $request){        
        //$request->validate(Procedimientos::$rules);        
        $input = $request->all(); 
        try {
            Procedimientos::create([
                "codProc" => $input["codigoProc"],
                "nomProc" => $input["nombreProc"],
                "conProc" => $input["condicionesProc"],
                "valProc" => $input["valorProc"],
                "estado" => 1
            ]);            
            Flash::success("Se ha registrado un nuevo procedimiento en la base de datos");
            return redirect("/empresa/procedimientos");            
        } catch (\Exception $e) {  
            echo $e;                    
            Flash::error($e->getMessage());
            return redirect('/empresa/procedimientos/crear');
        }
    }

    public function edit($id){
        $procedimiento = Procedimientos::where('id', $id)->first();        
        if($procedimiento == null){
            Flash::error("Error al tratar de generar el formulario de edición");
            return redirect("/empresa/procedimientos");
        }
        return view("empresa.procedimientos.edit", compact("procedimiento"));
    }

    public function update(Request $request){
        //$request->validate(Procedimientos::$rules);                
        $input = $request->all();        
        try {
            $procedimiento = Procedimientos::where('id', $input['id']);            
            if($procedimiento == null){
                Flash::error("Error al tratar de actualizar");
            }            
            $procedimiento->update([
                "codProc" => $input["codigoProc"],
                "nomProc" => $input["nombreProc"],
                "conProc" => $input["condicionesProc"],
                "valProc" => $input["valorProc"]                
            ]);            
            Flash::success("¡Se ha modificado con exito!");            
            return redirect("/empresa/procedimientos");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());            
            return redirect("/empresa/procedimientos");
        }
    }

    public function updateState($id, $estado){
        $procedimiento = Procedimientos::where('id', $id)->first();        
        if($procedimiento == null){
            Flash::error("Ups! Se ha generado un error al cambiar el estado...");
            return redirect("/empresa/procedimientos");
        }

        try {
            $procedimiento->update(["estado"=>$estado]);            
            Flash::success("Se modificó el estado del procedimiento");            
            return redirect("/empresa/procedimientos");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/procedimientos");
        }        
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $procedimientos = Procedimientos::all();               
        if(count($procedimientos) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($procedimientos);
            }else if(isset($input["excel"])){
                return $this->generar_excel($procedimientos);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/procedimientos");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/procedimientos");
        }
    }

    private function generar_pdf($procedimientos){             
        $pdf = PDF::loadView('pdf.procedimientos', compact("procedimientos"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('procedimientos.pdf');
    }


    private function generar_excel($procedimientos){
        $procedimientos = new ProcedimientosExport($procedimientos);
        return Excel::download($procedimientos, 'procedimientos.xlsx');
    }
}
