<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Models\Convenios;
use App\Models\Eps;
use App\Exports\ConveniosExport;

class ConveniosController extends Controller
{
    public function index(){        
        return view('empresa.convenios.index');
    }

    public function listar(Request $request){
        if(Auth::user()->rol->nomRol == 'Administrador') //se valida el tipo de usuario
            $convenios = Convenios::all();
        else{
            $convenios = Convenios::all()->where('estado',1);    
        }         
        return Datatables::of($convenios)
        ->editColumn("estado", function($convenio){
            return $convenio->estado == 1 ? "<span class='badge badge-success'> Activo" : "<span class='badge badge-danger'>Inactivo";
        })
        ->editColumn("durConv", function($convenio){
            return $convenio->durConv . ' meses';
        })
        ->editColumn("cosConv", function($convenio){
            return '$' . number_format($convenio->cosConv, 0);
        })
        ->editColumn("eps_id", function($convenio){
            return $convenio->eps->nomEps;
        })
        ->addColumn('editar', function($convenio){
            if($convenio->estado == 1){
               $estado = '<a href="/empresa/convenios/cambiarestado/'.$convenio->id.'/0" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a>';
            }else{
                $estado = '<a href="/empresa/convenios/cambiarestado/'.$convenio->id.'/1" class="btn btn-sm btn-success" title="Habilitar"><i class="fas fa-check"></i></a>';
            }
            return '<a href="/empresa/convenios/editar/'.$convenio->id.'" class="btn btn-sm btn-primary" title="Editar"><i class="fas fa-pen"></i></a>'. $estado;
        })        
        ->rawColumns(['editar', 'cambiar', 'estado'])
        ->make(true);
    }


    public function create(){    
        $eps = Eps::all();    
        return view('empresa.convenios.create', \compact('eps'));
    }

    public function store(Request $request){
        //$request->validate(Convenios::$rules);
        $input = $request->all();
        try {
            Convenios::create([                
                "cosConv" => $input["costo"],
                "durConv" => $input["duracion"],
                "fecAper" => $input["fechaConv"],                
                "nomConv" => $input["nombreConv"],
                "objConv" => $input["objetoConv"],
                "resolu" => $input["resolucion"],
                "eps_id" => $input["eps_id"],                                                
                "estado"=> 1
            ]);

            Flash::success("Se ha registrado un nuevo convenio!");
            return redirect("/empresa/convenios");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/convenios/crear");
        }
    }

    public function edit($id){
        $convenio = Convenios::where('id', $id)->first();
        $eps = Eps::all();
        if($convenio == null){
            Flash::error("Error al tratar de generar el formulario de edición");
            return redirect("/empresa/convenios");
        }
        return view("empresa.convenios.edit", compact("convenio", "eps"));
    }

    public function update(Request $request){
        //$request->validate(Convenios::$rules);
        $input = $request->all();
        try {
            $convenio = Convenios::where('id', $input["id"]);            
            if($convenio == null){
                Flash::error("Error al tratar de generar el formulario de edición");
                return redirect("/empresa/convenios");
            }            
            
            $convenio->update([
                "cosConv" => $input["costo"],
                "durConv" => $input["duracion"],
                "fecAper" => $input["fechaConv"],                
                "nomConv" => $input["nombreConv"],
                "objConv" => $input["objetoConv"],
                "resolu" => $input["resolucion"],
                "eps_id" => $input["eps_id"],                                                
                "estado"=> $input["estado"]
            ]);
            
            Flash::success("¡Se ha modificado el convenio!");
            return redirect("/empresa/convenios");
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/convenios");
        }
    }

    public function updateState($id, $estado){
        $convenio = Convenios::where('id', $id)->first();
        if($convenio == null){
            Flash::error("Ups! Se ha generado un error al cambiar el estado...");
            return redirect("/empresa/convenios");
        }

        try {
            $convenio->update(["estado"=>$estado]);
            Flash::success("Se modificó el estado del convenio");
            return redirect("/empresa/convenios");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/convenios");
        }        
    }
    
    public function exportar(Request $request){ 
        $input = $request->all();       
        $convenios = Convenios::all();               
        if(count($convenios) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($convenios);
            }else if(isset($input["excel"])){
                return $this->generar_excel($convenios);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/convenios");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/convenios");
        }
    }

    private function generar_pdf($convenios){             
        $pdf = PDF::loadView('pdf.convenios', compact("convenios"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('convenios.pdf');
    }


    private function generar_excel($convenios){
        $convenios = new ConveniosExport($convenios);
        return Excel::download($convenios, 'convenios.xlsx');
    }
}
