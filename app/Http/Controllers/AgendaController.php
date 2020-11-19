<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Exports\AgendaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use Flash;

class AgendaController extends Controller
{
    public function index(){
        return view('agenda.index');
    }

    public function listar(){
        $agenda = Agenda::all();
        $nueva_agenda = [];
        foreach($agenda as $value){
            $nueva_agenda[] = [
                "id"=>$value->id,
                "start"=>$value->fecha." ".$value->hora_inicio,
                "end"=>$value->fecha." ".$value->hora_final,
                "title"=>$value->descripcion,
                "backgroundColor"=>$value->estado == 1 ? "#1f7904" : "#7b0205",
                "textColor"=> "#fff",
                "extendsProps"=>[
                    "usuario_id"=>$value->usuario_id
                ]
            ];
        }

        return response()->json($nueva_agenda);
    }

    public function validarFecha($fecha, $horaInicial, $horaFinal){
        $agenda = Agenda::select("*")
            ->whereDate('fecha', $fecha)
            ->whereBetween('hora_inicio', [$horaInicial, $horaFinal])
            ->orWhereBetween('hora_final', [$horaInicial, $horaFinal])
            ->first();   

        return $agenda == null ? true : false;
    }
    
    public function guardar(Request $request){
        $input = $request->all();        
        if($this->validarFecha($input["txtFecha"],$input["txtHoraInicial"],$input["txtHoraFinal"])){
            $agenda = Agenda::create([
                "usuario_id"=>$input["ddlUsuarios"],
                "fecha"=>$input["txtFecha"],
                "hora_inicio"=>$input["txtHoraInicial"],
                "hora_final"=>$input["txtHoraFinal"],
                "descripcion"=>$input["txtDescripcion"]
            ]);
            return response()->json(["ok"=>true]);
        }else{
            return response()->json(["ok"=>false]);
        }
    }


    public function informe(){
        return view("agenda.informe");        
    }

    public function generar_informe(Request $request){
        $input = $request->all();
        $agenda = Agenda::select("*")            
            ->whereBetween('fecha', [$input["txtFechaInicial"], $input["txtFechaFinal"]])            
            ->get();          
        if(count($agenda) > 0){
            if(isset($input["pdf"])){
                return $this->generar_pdf($agenda, $input);
            }else if(isset($input["excel"])){
                return $this->generar_excel($agenda, $input);
            }else{
                return view("/agenda/informe");
            }
        }else{
            Flash::info("No se encontraron registros en ese rango de fechas");
            return redirect("/agenda/informe");
        }
    }


    private function generar_pdf($agenda, $input){
            $imagen = "./../../../public/assets/landing/assets/img/logo2.png";
            $pdf = PDF::loadView('pdf.agenda', compact("agenda", "input"));
            Mail::send('email.agenda', compact("agenda"), function ($mail) use ($pdf) {
                //$mail->from('john@styde.net', 'John Doe');
                $mail->to(['affonseca605@misena.edu.co']);
                $mail->attachData($pdf->output(), 'test.pdf');
            });
            return $pdf->stream('archivo.pdf');
    }


    private function generar_excel($agenda){
        $agenda = new AgendaExport($agenda);
        return Excel::download($agenda, 'agenda.xlsx');
    }

    

}
