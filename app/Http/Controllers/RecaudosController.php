<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Models\Empleados;
use App\Models\Recaudos;
use App\Exports\RecaudosExport;

class RecaudosController extends Controller
{
    public function index(){        
        return view('empresa.tesoreria.recaudos.index');
    }

    public function listar(Request $request){
        $recaudos = Recaudos::all();
        return Datatables::of($recaudos)
        ->editColumn("fecReca", function($recaudo){
            return $recaudo->fecReca->format('d-m-Y');       
        })
        ->editColumn("forPago", function($recaudo){
            return $recaudo->forPago == "EF" ? "Efectivo" : "Tarjeta Debito o Crédito";
        })
        ->editColumn("empleado_id", function($recaudo){
            $responsable = $recaudo->empleado->pNom;
            $responsable.= " " . $recaudo->empleado->pApe;
            return $responsable;            
        })
        ->editColumn("valor", function($recaudo){
            return '$'. number_format($recaudo->valor, 0);
        }) 
        ->addColumn('editar', function($recaudo){
            return '<a href="/empresa/tesoreria/recaudos/editar/'.$recaudo->id.'" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>';
        }) 
        ->rawColumns(['editar'])     
        ->make(true);
    }

    public function create(){
        $empleados = Empleados::all();
        return view('empresa.tesoreria.recaudos.create', compact("empleados"));        
    }

    public function store(Request $request){        
        //$request->validate(Procedimientos::$rules);        
        $input = $request->all(); 
        try {
            Recaudos::create([
                "concep" => $input["conceptoReca"],
                "fecReca" => $input["fechaReca"],
                "forPago" => $input["formaPago"],
                "valor" => $input["valorReca"],                
                "empleado_id" => $input["empleado"],
            ]);            
            Flash::success("Se ha registrado un nuevo recaudo en la base de datos");
            return redirect("/empresa/tesoreria/recaudos");            
        } catch (\Exception $e) {  
            echo $e;                    
            Flash::error($e->getMessage());
            return redirect('/empresa/tesoreria/recaudos/crear');
        }
    }

    public function edit($id){
        $empleados = Empleados::all();
        $recaudo = Recaudos::where('id', $id)->first();        
        if($recaudo == null){
            Flash::error("Error al tratar de generar el formulario de edición");
            return redirect("/empresa/tesoreria/recaudos");
        }
        return view("empresa/tesoreria.recaudos.edit", compact("recaudo", "empleados"));
    }

    public function update(Request $request){
        //$request->validate(Procedimientos::$rules);                
        $input = $request->all();        
        try {
            $recaudo = Recaudos::where('id', $input['id']);            
            if($recaudo == null){
                Flash::error("Error al tratar de actualizar");
            }            
            $recaudo->update([
                "concep" => $input["conceptoReca"],
                "fecReca" => $input["fechaReca"],
                "forPago" => $input["formaPago"],
                "valor" => $input["valorReca"],                
                "empleado_id" => $input["empleado"]               
            ]);            
            Flash::success("¡Se ha modificado con exito!");            
            return redirect("/empresa/tesoreria/recaudos");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());            
            return redirect("/empresa/tesoreria/recaudos");
        }
    }

    public function exportar(Request $request){
        $input = $request->all();       
        $recaudos = Recaudos::all();               
        if(count($recaudos) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($recaudos);
            }else if(isset($input["excel"])){
                return $this->generar_excel($recaudos);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/tesoreria/recaudos");
            }
        }else{            
            return redirect("/empresa/tesoreria/recaudos");
        }
    }

    private function generar_pdf($recaudos){
        $pdf = PDF::loadView('pdf.recaudos', compact("recaudos"))
        ->setPaper('a4', 'landscape');
        return $pdf->stream('recaudos.pdf');
    }

    private function generar_excel($recaudos){
        $recaudos = new RecaudosExport($recaudos);
        return Excel::download($recaudos, 'recaudos.xlsx');
    }
}
