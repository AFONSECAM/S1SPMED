<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Models\Cargos;
use App\Exports\CargosExport;


class CargosController extends Controller
{
    public function index(){
        return view('empresa.cargos.index');
    }
    

    public function listar(){
        $cargos = Cargos::all();        
        
        return Datatables::of($cargos)
        ->editColumn("salCar", function($cargo){
            return "$" . number_format($cargo->salCar, 0);
        })
        ->addColumn("accion", function ($cargo) {
            return '<a href="/empresa/cargos/editar/'.$cargo->id.'" class="btn btn-xs btn-primary"><i class="fas fa-pen"></i></a>';
        })
        ->rawColumns(['accion', 'salario'])
        ->make(true);            
    }


    public function create(){
        return view('empresa.cargos.create');
    }

    public function store(Request $request) {
        //$request->validate(TiposId::$rules);
        $input = $request->all();
        try {
            Cargos::create([
                "nomCar"=>$input["nombre"],
                "salCar"=>$input["salario"],
            ]);
            Flash::success("Se registro el cargo correctamente");
            return redirect("/empresa/cargos");
        } catch (Exception $e) {
            Flash::error($e.getMessage());
            return redirect("/empresa/cargos/guardar");
        }
    }

    public function edit($id){
        $cargo = Cargos::find($id);
        if($cargo == null){
            Flash::error("Cargo no encontrado");
            return redirect("/empresa/cargos");
        }
        return view("empresa.cargos.edit", compact("cargo"));
    }


    public function update(Request $request) {
        //$request->validate(TiposId::rules);
        $input = $request->all();
        try {
            $cargo = Cargos::find($input["id"]);
            if($cargo == null){
                Flash::error("Cargo no encontrado");
                return redirect("/empresa/cargos");
            }

            $cargo->update([                
                "nomCar"=>$input["nombre"],
                "salCar"=>$input["salario"],
            ]);
            Flash::success("Se modifico el cargo");
            return redirect("/empresa/cargos");
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/cargos");
        }
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $cargos = Cargos::all();               
        if(count($cargos) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($cargos);
            }else if(isset($input["excel"])){
                return $this->generar_excel($cargos);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/cargos");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/cargos");
        }
    }

    private function generar_pdf($cargos){             
        $pdf = PDF::loadView('pdf.cargos', compact("cargos"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('cargos.pdf');
    }


    private function generar_excel($cargos){
        $cargos = new CargosExport($cargos);
        return Excel::download($cargos, 'cargos.xlsx');
    }
}
