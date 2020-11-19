<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\Insumos;
use App\Models\Empleados;
use App\Models\Pacientes;
use App\Models\Usuarios;
use App\Models\Sedes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $categorias = count(Categorias::all());
        $insumos = count(Insumos::all());
        $empleados = count(Empleados::all());
        $pacientes = count(Pacientes::all());
        $usuarios = count(Usuarios::all());
        $sedes = count(Sedes::all());
        return view('home')
        ->with('categorias',$categorias)
        ->with('insumos',$insumos)
        ->with('empleados',$empleados)
        ->with('pacientes',$pacientes)
        ->with('usuarios',$usuarios)
        ->with('sedes',$sedes);
    }
}
