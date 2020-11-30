<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use DataTables;
use Flash;


use App\Models\User;
use App\Models\Empleados;
use App\Models\Roles;
use App\Exports\UsuariosExport;


class UsuariosController extends Controller
{
    public function index(){
        return view("empresa.usuarios.index");
    }

    public function create(){
        $empleados = Empleados::all();
        $roles = Roles::all();
        return view("empresa.usuarios.create", compact("empleados", "roles"));
    }

    public function listar(Request $request){
        $usuarios = User::all();
        return Datatables::of($usuarios)    
        ->editColumn("rol_id", function($usuario){
            return $usuario->rol->nomRol;
        })
        ->addColumn('cambiar', function($usuario){
            if($usuario->estado == 1){
                return '
                    <a href="/empresa/usuarios/cambiarestado/'.$usuario->id.'/0" class="btn btn-xs btn-danger" title"Click para activar"><i class="fa fa-times"></i> Inactivo</a>
                    <small id="helpEstado" class="form-text text-muted">Click para Activar.</small>
                ';
            }else{
                return '
                    <a href="/empresa/usuarios/cambiarestado/'.$usuario->id.'/1" class="btn btn-xs btn-success" title"Click para inactivar"><i class="fas fa-check"></i> Activo</a>
                    <small id="helpEstado" class="form-text text-muted">Click para Inactivar.</small>
                ';
            }
        })
        ->rawColumns(['cambiar'])
        ->make(true);
    }

    public function store(Request $request){
        $input = $request->all();
        try {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'rol_id' => $input['rol'],
                'empleado_id' => $input["empleado"],            
            ]);
            Flash::success("Se ha creado el usuario con exito");
            return redirect("/empresa/usuarios");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/usuarios");
        }            
    }

    public function updateState($id, $estado){
        $usuario = User::where('id', $id)->first();
        if($usuario == null){
            Flash::error("Ups! Se ha generado un error al cambiar el estado...");
            return redirect("/empresa/usuarios");
        }

        try {
            $usuario->update(["estado"=>$estado]);
            Flash::success("Se modificó el estado del usuario");
            return redirect("/empresa/usuarios");                   
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/empresa/usuarios");
        }        
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $usuarios = User::all();               
        if(count($usuarios) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($usuarios);
            }else if(isset($input["excel"])){
                return $this->generar_excel($usuarios);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/empresa/usuarios");
            }
        }else{            
            return redirect("/empresa/usuarios");
        }
    }

    private function generar_pdf($usuarios){             
        $pdf = PDF::loadView('pdf.usuarios', compact("usuarios"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('usuarios.pdf');
    }


    private function generar_excel($usuarios){
        $usuarios = new UsuariosExport($usuarios);
        return Excel::download($usuarios, 'usuarios.xlsx');
    }
}
