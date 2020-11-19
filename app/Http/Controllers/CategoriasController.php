<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;
use DataTables;

use App\Exports\CategoriasExport;
use App\Imports\CategoriasImport;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function index(){        
        return view("inventario.categorias.index");
    }

    public function listar(Request $request){
        $categorias = Categorias::all();
        return Datatables::of($categorias)
        ->editColumn("tipoCate", function($categoria){
            return $categoria->tipoCate == 0 ? "<span class='badge badge-primary'> Insumos" : "<span class='badge badge-info'>Medicamentos";
        })
        ->addColumn("editar", function($categoria){
            return '<a href="/inventario/categorias/editar/'.$categoria->id.'" class="btn btn-sm btn-primary" title="Editar"><i class="fas fa-pen"></i></a>';
        })
        ->rawColumns(['editar', 'tipoCate'])
        ->make(true);
    }

    public function view($id){
        $categoria = Categorias::where('id', $id)->first();
        if($categoria == null){
            Flash::error("Error al cargar la vista de la categoría");
            return redirect("/inventario/categorias");
        }        
        return view("inventario.categorias.view", \compact("categoria"));
    }

    public function create(){
        return view("inventario.categorias.create");
    }

    public function store(Request $request){        
        $input = $request->all();
        try {
            Categorias::create([
                "nomCate" => $input["nombre"],
                "tipoCate" => $input["tipoCate"]
            ]);
            Flash::success("Se ha creado una nueva categoría");
            return redirect("/inventario/categorias");
        } catch (\Exception $e) {
            Flash::error($e-getMessage());
            return redirect("/inventario/categorias/crear");            
        }
    }

    public function edit($id){
        $categoria = Categorias::where('id', $id)->first();
        if($categoria == null){
            Flash::error("Se ha producido un error, contacte con el administrador!");
            return redirect("/inventario/categorias");
        }
        return view("inventario.categorias.edit", compact("categoria"));
    }

    public function update(Request $request){
        $input = $request->all();
        try {
            $categoria = Categorias::where('id', $input["id"]);
            if($categoria == null){
                Flash::error("Se ha producido un error, contacte al administrador!");
                return redirect("/inventario/categorias");
            }
            $categoria->update([
                "nomCate" => $input["nombre"],
                "tipoCate" => $input["tipoCate"]
            ]);
            Flash::success("Se ha modificado el nombre de la categoría");
            return redirect("/inventario/categorias");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());             
            return redirect("/inventario/categorias");
        }
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $categorias = Categorias::all();               
        if(count($categorias) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($categorias);
            }else if(isset($input["excel"])){
                return $this->generar_excel($categorias);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/inventario/categorias");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/inventario/categorias");
        }
    }

    private function generar_pdf($categorias){             
        $pdf = PDF::loadView('pdf.categorias', compact("categorias"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('categorias.pdf');
    }


    private function generar_excel($categorias){
        $categorias = new CategoriasExport($categorias);
        return Excel::download($categorias, 'categorias.xlsx');
    }

    public function importExcel(Request $request){
        $file = $request->file('file');
        Excel::import(new CategoriasImport, $file);
        Flash::success("Importación de datos completa!");
        return view("inventario.categorias.index");
    }
}
