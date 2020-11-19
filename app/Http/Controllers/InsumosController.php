<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use UxWeb\SweetAlert\SweetAlert;
use Flash;
use DataTables;
Use Carbon\Carbon;

use App\Exports\InsumosExport;
use App\Imports\InsumosImport;
use App\Models\Insumos;
use App\Models\Categorias;
use App\Models\User;

class InsumosController extends Controller
{
    public function index(){  
        $insumos = Insumos::all();   
        $userData = Insumos::select(\DB::raw("COUNT(*) as count"))                    
                    ->groupBy(\DB::raw("categoria_id"))
                    ->pluck('count');  
        return view("inventario.insumos.index", \compact("insumos", "userData"));        
    }

    public function listar(){
        $insumos = Insumos::all();
        return Datatables::of($insumos)
        ->editColumn('precio', function($insumo){
            return "$" . number_format($insumo->precioU, 0);
        })
        ->editColumn('nomCate', function($insumo){            
            return $insumo->categoria->nomCate;
        })
        ->editColumn('fecVen', function($insumo){             
            return $insumo->fecVen->format('d-m-Y');                       
        })
        ->addColumn('editar', function($insumo){
            return '<a href="/inventario/insumos/editar/'.$insumo->id.'" class="btn btn-sm btn-primary"><i class="fas fa-pen"></i></a>';
        })
        
        ->rawColumns(['editar'])       
        ->make(true);
    }

    public function view($id){
        $insumo = Insumos::where('id',$id)->first();
        if($insumo == null){
            Flash::error("Error al cargar los datos");
            return redirect("/inventario/insumos");
        }
        return view("inventario.insumos.view", \compact("insumo"));
    }

    public function create(){
        $categorias = Categorias::all();
        return view("inventario.insumos.create", compact("categorias"));
    }


    public function store(Request $request){
        $input = $request->all();
        try {
            Insumos::create([
                "codIns" => $input["codigo"],
                "concen" => $input["concentracion"],
                "fecVen" => $input["fecha"],
                "labora" => $input["laboratorio"],
                "nomIns" => $input["nombre"],
                "precioU" => $input["precio"],
                "pres" => $input["presentacion"],
                "unid" => $input["unidad"],
                "categoria_id" => $input["categoria"]
            ]);
            Flash::success("Se ha registrado un nuevo insumo");
            return redirect("/inventario/insumos");
        } catch (\Exception $e) {
            Flash::error($e->getMessage());
            return redirect("/inventario/insumos/crear");
        }
    }


    public function edit($id){
        $categorias = Categorias::all();
        $insumo = Insumos::where('id',$id)->first();
        if($insumo == null){        
            Flash::error("Error al cargar la información para editarla");
            return redirect("/inventario/insumos");
        }
        return view("inventario.insumos.edit", \compact("insumo", "categorias"));    
    }


    public function update(Request $request){
        $input = $request->all();
        $msj = '<script>swal("Edición exitosa");</script>';
        try {
            $insumo = Insumos::where('id',$input['id']);
            if($insumo == null){
                Flash::error("Se ha producido un error al generar la vista para actualizar");
                return \redirect("/inventario/insumos");
            }
            $insumo->update([
                "codIns" => $input["codigo"],
                "concen" => $input["concentracion"],
                "fecVen" => $input["fecha"],
                "labora" => $input["laboratorio"],
                "nomIns" => $input["nombre"],
                "precioU" => $input["precio"],
                "pres" => $input["presentacion"],
                "unid" => $input["unidad"],
                "categoria_id" => $input["categoria"]
            ]);
            
            //Flash::success("Se ha modificado el insumo con éxito");
            return redirect("/inventario/insumos")->with('msj');
        } catch (\Exception $e) {
            Flash::important($e->getMessage());
            return redirect("/inventario/insumos");
        }
    }

    public function exportar(Request $request){ 
        $input = $request->all();       
        $insumos = Insumos::all();               
        if(count($insumos) > 0){            
            if(isset($input["pdf"])){
                return $this->generar_pdf($insumos);
            }else if(isset($input["excel"])){
                return $this->generar_excel($insumos);
            }else{
                Flash::error("Error al generar el archivo! :(");
                return redirect("/inventario/insumos");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/inventario/insumos");
        }
    }

    private function generar_pdf($insumos){             
        $pdf = PDF::loadView('pdf.insumos', compact("insumos"))
        ->setPaper('a4', 'landscape');        
        return $pdf->stream('insumos.pdf');
    }


    private function generar_excel($insumos){
        $insumos = new InsumosExport($insumos);
        return Excel::download($insumos, 'insumos.xlsx');
    }

    public function importExcel(Request $request){
        $file = $request->file('file');
        Excel::import(new InsumosImport, $file);
        Flash::success("Importación de datos completa!");
        return view("inventario.insumos.index");
    }
}
