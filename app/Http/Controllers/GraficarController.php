<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class GraficarController extends Controller
{
    public function graficarEmpleados(){
        $empleados = Empleados::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('fecIng', '>', 2019)                    
        ->groupBy(\DB::raw("fecIng"))
        ->pluck('count');                               
        return view("graficas.graficarEmpleados", \compact('empleados',));
    }
}
