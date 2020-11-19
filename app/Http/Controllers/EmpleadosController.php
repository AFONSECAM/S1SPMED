<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
Use Carbon\Carbon;

use App\Exports\EmpleadosExport;
use App\Models\Empleados;
use App\Models\TiposId;
use App\Models\Eps;
use App\Models\Arl;
use App\Models\Cargos;


class EmpleadosController extends Controller
{
    public function index(){  
        if(Auth::user()->rol->nomRol == 'Administrador'){
            $empleados = Empleados::all();                      
        } //se valida el tipo de usuario            
        else{
            $empleados = Empleados::all()->where('estado',1);              
        }       
        
        return view("empresa.empleados.index", compact("empleados"));
    }

    public function view($id){
        $empleado = Empleados::where('id', $id)->first();
        $edad = Carbon::createFromDate($empleado->fecNac)->age;
        if($empleado == null){
            Flash::error("Error al cargar la vista del empleado");
            return redirect("/empresa/empleados");
        }
        return view("empresa.empleados.view", compact("empleado", "edad"));
    }

    public function create(){        
        $tiposId = TiposId::all();        
        $epss = Eps::all();        
        $arls = Arl::all();        
        $cargos = Cargos::all();   
        return view("empresa.empleados.create", compact("tiposId", "epss", "arls", "cargos"));
    }

    public function store(Request $request){
        $input = $request->all();
        try {
            Pacientes::create([
                "ciuRes" => $input['ciudad'],                
                "dirRes" => $input['direccion'],
                "eCivil" => $input['estadoCivil'],
                "mailEmp" => $input['email'],
                "fecIng" => $input['fechaIng'],
                "fecNac" => $input["fechaNac"],
                "genero" => $input["chkGenero"],
                "nIdEmp" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "pNom" => $input["primerNom"],
                "rh" => $input['rh'].$input['rhS'],
                "sApe" => $input["segundoApe"],
                "sNom" => $input["segundoNom"],
                "telEmp" => $input['telefono'],
                //"edad" => Carbon::createFromDate($input["fechaNac"])->age,                
                "cargo_id" => $input["cargo"],                
                "eps_id" => $input['eps'],
                "tipoId_id" => $input["tipoId"],                
                "estado" => 1
            ]);
            Flash::success("Se ha registrado un nuevo empleado en la base de datos");
            return redirect("/empresa/empleados");  
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect('/empresa/empleados');
        }
    }

    public function edit($id){
        $empleado = Empleados::where('id', $id)->first();
        $tiposId = TiposId::all();
        $epss = Eps::all();
        $arls = Arl::all();        
        $cargos = Cargos::all();        
        if($empleado == null){
            Flash::error("Error al cargar la información para editarla");
            return redirect("/empresa/empleados");
        }
        return view("empresa.empleados.edit", compact("empleado", "tiposId", "epss", "arls", "cargos"));
    }

    public function update(Request $request){
        $input = $request->all();
        try {
            $empleado = Empleados::where('id',$input['id']);
            if($empleado == null){
                Flash::error("Se ha producido un error al generar la vista para actualizar");
                return \redirect("/empresa/empleados");
            }
            $empleado->update([
                "ciuRes" => $input['ciudad'],                
                "dirRes" => $input['direccion'],
                "eCivil" => $input['estadoCivil'],
                "mailEmp" => $input['email'],
                "fecIng" => $input['fechaIng'],
                "fecNac" => $input["fechaNac"],
                "genero" => $input["chkGenero"],
                "nIdEmp" => $input["numeroId"],
                "pApe" => $input["primerApe"],
                "pNom" => $input["primerNom"],
                "rh" => $input['rh'].$input['rhS'],
                "sApe" => $input["segundoApe"],
                "sNom" => $input["segundoNom"],
                "telEmp" => $input['telefono'],
                //"edad" => Carbon::createFromDate($input["fechaNac"])->age,                
                "cargo_id" => $input["cargo_id"],                
                "eps_id" => $input['eps_id'],
                "tipoId_id" => $input["tipoId_id"],                
                "estado" => $input['estado']                
            ]);
            Flash::success("Se ha modificado el empleado con éxito");
            return redirect("/empresa/empleados");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/empleados");
        }
    }
    
    public function updateState($id, $estado){
        $empleado = Empleados::where('id', $id)->first();
        if($empleado == null){
            Flash::error("Ups! Se ha generado un error al cambiar el estado...");
            return redirect("/empresa/empleados");
        }
    
        try {
            $empleado->update(["estado"=>$estado]);
            Flash::info("Se modificó el estado del empleado " . $empleado->pNom . " " . $empleado->sNom . " " . $empleado->pApe . " " . $paciente->sApe . " su estado pasó a ser: " . $empleado->estado);
            return redirect("/empresa/empleados");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/empleados");
        }        
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $empleados = Empleados::all();               
        if(count($empleados) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($empleados);
            }else if(isset($input["excel"])){
                return $this->generar_excel($empleados);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/empleados");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/empresa/empleados");
        }
    }

    private function generar_pdf($empleados){             
        $pdf = PDF::loadView('pdf.empleados', compact("empleados"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('empleados.pdf');
    }


    private function generar_excel($empleados){
        $empleados = new EmpleadosExport($empleados);
        return Excel::download($empleados, 'empleados.xlsx');
    }
}
