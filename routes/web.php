<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'LandingController@index');

Auth::routes();

Route::middleware(['auth','validarRol'])->group(function(){
    Alert::success("Bienvenido");
    Route::get('/home', 'HomeController@index')->name('home');      

    //Empresa
    Route::get('/empresa', 'EmpresaController@index');


    // Empresa -> Cargos
    Route::get('/empresa/cargos', 'CargosController@index');
    Route::get('/empresa/cargos/listar', 'CargosController@listar');
    Route::get('/empresa/cargos/crear', 'CargosController@create');
    Route::post('/empresa/cargos/guardar', 'CargosController@store');
    Route::get('/empresa/cargos/editar/{id}', 'CargosController@edit');
    Route::post('/empresa/cargos/actualizar', 'CargosController@update');    
    Route::post('/empresa/cargos/exportar', 'CargosController@exportar');

    //Empresa -> Convenios
    Route::get('/empresa/convenios', 'ConveniosController@index');
    Route::get('/empresa/convenios/listar', 'ConveniosController@listar');
    Route::get('/empresa/convenios/crear', 'ConveniosController@create');
    Route::post('/empresa/convenios/guardar', 'ConveniosController@store');
    Route::get('/empresa/convenios/editar/{id}', 'ConveniosController@edit');
    Route::post('/empresa/convenios/actualizar', 'ConveniosController@update');
    Route::get('/empresa/convenios/cambiarestado/{id}/{estado}', 'ConveniosController@updateState');    
    Route::post('/empresa/convenios/exportar', 'ConveniosController@exportar');    

    // Empresa -> Empleados
    Route::get('/empresa/empleados', 'EmpleadosController@index');
    Route::get('/empresa/empleados/view/{id}', 'EmpleadosController@view');
    Route::get('/empresa/empleados/crear', 'EmpleadosController@create');
    Route::post('/empresa/empleados/guardar', 'EmpleadosController@store');
    Route::get('/empresa/empleados/editar/{id}', 'EmpleadosController@edit');
    Route::post('/empresa/empleados/actualizar', 'EmpleadosController@update');
    Route::post('/empresa/empleados/exportar', 'EmpleadosController@exportar');

    // Empresa -> Pacientes
    Route::get('/empresa/pacientes', 'PacientesController@index');
    Route::get('/empresa/pacientes/view/{id}', 'PacientesController@view');
    Route::get('/empresa/pacientes/crear', 'PacientesController@create');
    Route::post('/empresa/pacientes/guardar', 'PacientesController@store');
    Route::get('/empresa/pacientes/editar/{id}', 'PacientesController@edit');
    Route::post('/empresa/pacientes/actualizar', 'PacientesController@update');
    Route::get('/empresa/pacientes/cambiarestado/{id}/{estado}', 'PacientesController@updateState');
    Route::post('/empresa/pacientes/exportar', 'PacientesController@exportar');

    // Empresa -> Pacientes -> Acompañantes
    Route::get('/empresa/pacientes/acompanantes/{id}', 'AcompanantesController@index'); 
    Route::get('/empresa/pacientes/acompanantes/listar/{id}', 'AcompanantesController@listar');
    Route::get('/empresa/pacientes/acompanantes/crear/{id}', 'AcompanantesController@create');
    Route::post('/empresa/pacientes/acompanantes/guardar', 'AcompanantesController@store');
    Route::get('/empresa/pacientes/acompanantes/editar/{id}', 'AcompanantesController@edit');
    Route::post('/empresa/pacientes/acompanantes/actualizar', 'AcompanantesController@update');
    

    // Empresa->Procedimientos
    Route::get('/empresa/procedimientos', 'ProcedimientosController@index');
    Route::get('/empresa/procedimientos/listar', 'ProcedimientosController@listar');
    Route::get('/empresa/procedimientos/crear', 'ProcedimientosController@create');
    Route::post('/empresa/procedimientos/guardar', 'ProcedimientosController@save');
    Route::get('/empresa/procedimientos/editar/{id}', 'ProcedimientosController@edit');
    Route::post('/empresa/procedimientos/actualizar', 'ProcedimientosController@update');
    Route::get('/empresa/procedimientos/cambiarestado/{id}/{estado}', 'ProcedimientosController@updateState');
    Route::post('/empresa/procedimientos/exportar', 'ProcedimientosController@exportar');

    // Empresa->Sedes
    Route::get('/empresa/sedes', 'SedesController@index');
    Route::get('/empresa/sedes/listar', 'SedesController@listar');
    Route::get('/empresa/sedes/crear', 'SedesController@create');
    Route::post('/empresa/sedes/guardar', 'SedesController@store');
    Route::get('/empresa/sedes/editar/{id}', 'SedesController@edit');
    Route::post('/empresa/sedes/actualizar', 'SedesController@update');
    Route::get('/empresa/sedes/cambiarestado/{id}/{estado}', 'SedesController@updateState');
    Route::post('/empresa/sedes/exportar', 'SedesController@exportar');
    
        
    

    // Empresa->TiposId
    Route::get('/empresa/tiposid','TiposIdController@index');
    Route::get('/empresa/tiposid/listar','TiposIdController@listar');
    Route::get('/empresa/tiposid/crear','TiposIdController@create');
    Route::post('/empresa/tiposid/guardar','TiposIdController@store');
    Route::get('/empresa/tiposid/editar/{id}','TiposIdController@edit');
    Route::post('/empresa/tiposid/actualizar','TiposIdController@update');


    

    // Empresa -> Tesoreria -> Recaudos
    Route::get('/empresa/tesoreria/recaudos', 'RecaudosController@index');
    Route::get('/empresa/tesoreria/recaudos/listar', 'RecaudosController@listar');
    Route::get('/empresa/tesoreria/recaudos/crear', 'RecaudosController@create');
    Route::post('/empresa/tesoreria/recaudos/guardar', 'RecaudosController@store');
    Route::get('/empresa/tesoreria/recaudos/editar/{id}', 'RecaudosController@edit');
    Route::post('/empresa/tesoreria/recaudos/actualizar', 'RecaudosController@update'); 
    Route::post('/empresa/tesoreria/recaudos/exportar', 'RecaudosController@exportar'); 
    
    
    // Empresa -> Tesoreria -> Gastos
    Route::get('/empresa/tesoreria/gastos', 'GastosController@index');
    Route::get('/empresa/tesoreria/gastos/listar', 'GastosController@listar');
    Route::get('/empresa/tesoreria/gastos/crear', 'GastosController@create');
    Route::post('/empresa/tesoreria/gastos/guardar', 'GastosController@store');
    Route::get('/empresa/tesoreria/gastos/editar/{id}', 'GastosController@edit');
    Route::post('/empresa/tesoreria/gastos/actualizar', 'GastosController@update'); 
    Route::post('/empresa/tesoreria/gastos/exportar', 'GastosController@exportar'); 


    //Empresa -> Usuarios
    Route::get('/empresa/usuarios', 'UsuariosController@index');
    Route::get('/empresa/usuarios/crear', 'UsuariosController@create');
    Route::get('/empresa/usuarios/listar', 'UsuariosController@listar');
    Route::post('/empresa/usuarios/guardar', 'UsuariosController@store');
    Route::get('/empresa/usuarios/cambiarestado/{id}/{estado}', 'UsuariosController@updateState');
    Route::post('/empresa/usuarios/exportar', 'UsuariosController@exportar');


    //Inventario
    Route::get('/inventario', 'InventarioController@index');

    //Inventario->Categorias
    Route::get('/inventario/categorias', 'CategoriasController@index');
    Route::post('/inventario/categorias/importar', 'CategoriasController@importExcel');
    Route::get('/inventario/categorias/view/{id}', 'CategoriasController@view');
    Route::get('/inventario/categorias/listar', 'CategoriasController@listar');
    Route::get('/inventario/categorias/crear', 'CategoriasController@create');
    Route::post('/inventario/categorias/guardar', 'CategoriasController@store');
    Route::get('/inventario/categorias/editar/{id}', 'CategoriasController@edit');
    Route::post('/inventario/categorias/actualizar', 'CategoriasController@update');
    Route::post('/inventario/categorias/exportar', 'CategoriasController@exportar');


    //Insumos
    Route::get('/inventario/insumos', 'InsumosController@index');
    Route::post('/inventario/insumos/importar', 'InsumosController@importExcel');
    Route::get('/inventario/insumos/view/{id}', 'InsumosController@view');
    Route::get('/inventario/insumos/listar', 'InsumosController@listar');
    Route::get('/inventario/insumos/crear', 'InsumosController@create');
    Route::post('/inventario/insumos/guardar', 'InsumosController@store');
    Route::get('/inventario/insumos/editar/{id}', 'InsumosController@edit');
    Route::post('/inventario/insumos/actualizar', 'InsumosController@update');
    Route::post('/inventario/insumos/exportar', 'InsumosController@exportar');



    //Agenda
    Route::get('/agenda', 'AgendaController@index');
    Route::get('/agenda/listar', 'AgendaController@listar');
    Route::post('/agenda/guardar', 'AgendaController@guardar'); 

    Route::get('/agenda/informe', 'AgendaController@informe');
    Route::post('/agenda/generar/informe', 'AgendaController@generar_informe'); 


    //Consulta
    Route::get('/consulta', 'ConsultaController@index');
    Route::get('/consulta/listar', 'ConsultaController@listar');
    Route::get('/consulta/consulta/{id}', 'ConsultaController@inicioConsulta');
    Route::get('/consulta/consultaPaciente', 'ConsultaController@consulta');


    //Graficas
    Route::get('/graficar/empleados', 'GraficarController@graficarEmpleados');
    
        
});

    
   


    