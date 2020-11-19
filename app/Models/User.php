<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'rol_id',
        'empleado_id'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rol(){
        return $this->belongsTo(Roles::class);
    }

    public static $menu = 
    [
        "Administrador" => 
        [
            ["nombre"=>"Inicio", "url"=>"/home", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-speedometer"],
            ["nombre"=>"Administrativo", "url"=>"/empresa", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-briefcase"],                                                
            ["nombre"=>"Agenda", "url"=>"", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-calendar",
                "hijos"=> [
                    ["nombre"=>"Ver Agenda", "url"=>"/agenda", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],
                    ["nombre"=>"Reporte Citas", "url"=>"/agenda/informe", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],                        
                ]
            ],
            ["nombre"=>"Consulta", "url"=>"/consulta", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-clipboard"],                                                                             
            ["nombre"=>"Inventario", "url"=>"","icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-3d",
                "hijos"=> [
                    ["nombre"=>"Categorías", "url"=>"/inventario/categorias", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],
                    ["nombre"=>"Insumos", "url"=>"/inventario/insumos", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],                
                ]                    
            ]             
        ],

        "Enfermera" => 
        [
            ["nombre"=>"Inicio", "url"=>"/home", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-speedometer"],                                        
            ["nombre"=>"Inventario", "url"=>"","icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-3d",
                "hijos"=> [
                    ["nombre"=>"Categorías", "url"=>"/inventario/categorias", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],
                    ["nombre"=>"Insumos", "url"=>"/inventario/insumos", "icono"=>"assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add"],                
                ]                    
            ]             
        ]
    ];


    public static $permisos =
    [
        "Administrador" =>
        [
            ["url" => "/home",    "method"=>"GET", "identica"=>true],            
            ["url" => "/empresa", "method"=>"GET", "identica"=>true],
            // Empresa -> Cargos            
            ["url" => "/empresa/cargos", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/cargos/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/cargos/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/cargos/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/cargos/editar/", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/cargos/actualizar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/cargos/exportar", "method"=>"POST", "identica"=>false],
            //Empresa -> Convenios
            ["url" => "/empresa/convenios", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/convenios/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/convenios/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/convenios/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/convenios/editar/", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/convenios/actualizar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/convenios/cambiarestado/", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/convenios/exportar", "method"=>"POST", "identica"=>true],
            // Empresa -> Empleados
            ["url" => "/empresa/empleados", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/empleados/view/", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/empleados/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/empleados/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/empleados/editar/", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/empleados/actualizar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/empleados/exportar", "method"=>"POST", "identica"=>true],
            // Empresa -> Pacientes
            ["url" => "/empresa/pacientes", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/pacientes/view/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/pacientes/crear", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/pacientes/guardar", "method"=>"POST", "identica" => true],
            ["url" => "/empresa/pacientes/editar/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/pacientes/actualizar", "method"=>"POST", "identica" => true],
            ["url" => "/empresa/pacientes/actualizar", "method"=>"POST", "identica" => true],            
            ["url" => "/empresa/pacientes/cambiarestado/", "method"=>"GET", "identica" => false],            
            ["url" => "/empresa/pacientes/exportar", "method"=>"POST", "identica" => true],            
            // Empresa -> Pacientes -> Acompañantes
            ["url" => "/empresa/pacientes/acompanantes/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/pacientes/acompanantes/listar/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/pacientes/acompanantes/crear/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/pacientes/acompanantes/guardar", "method"=>"POST", "identica" => true],
            ["url" => "/empresa/pacientes/acompanantes/editar/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/pacientes/acompanantes/actualizar", "method"=>"POST", "identica" => true],
            // Empresa->Procedimientos            
            ["url" => "/empresa/procedimientos", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/procedimientos/listar", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/procedimientos/crear", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/procedimientos/guardar", "method"=>"POST", "identica" => true],
            ["url" => "/empresa/procedimientos/editar/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/procedimientos/actualizar", "method"=>"POST", "identica" => true],
            ["url" => "/empresa/procedimientos/cambiarestado/", "method"=>"GET", "identica" => false],
            ["url" => "/empresa/procedimientos/exportar", "method"=>"POST", "identica" => true],
            // Empresa->Sedes
            ["url" => "/empresa/sedes", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/sedes/listar", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/sedes/crear", "method"=>"GET", "identica" => true],
            ["url" => "/empresa/sedes/guardar", "method"=>"POST", "identica" => true],
            ["url" => "/empresa/sedes/editar/", "method"=>"GET", "identica" => false],            
            ["url" => "/empresa/sedes/actualizar", "method"=>"POST", "identica" => true],            
            ["url" => "/empresa/sedes/cambiarestado/", "method"=>"GET", "identica" => false],            
            ["url" => "/empresa/sedes/exportar", "method"=>"POST", "identica" => true],
            // Empresa->TiposId
            ["url" => "/empresa/tiposId", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tiposId/listar", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tiposId/crear", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tiposId/guardar", "method"=>"POST", "identica" => true], 
            ["url" => "/empresa/tiposId/editar/", "method"=>"GET", "identica" => false], 
            ["url" => "/empresa/tiposId/actualizar", "method"=>"POST", "identica" => true], 


            // Empresa -> Tesoreria -> Recaudos
            ["url" => "/empresa/tesoreria/recaudos", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tesoreria/recaudos/listar", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tesoreria/recaudos/crear", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tesoreria/recaudos/guardar", "method"=>"POST", "identica" => true], 
            ["url" => "/empresa/tesoreria/recaudos/editar/", "method"=>"GET", "identica" => false], 
            ["url" => "/empresa/tesoreria/recaudos/actualizar", "method"=>"POST", "identica" => true], 
            ["url" => "/empresa/tesoreria/recaudos/exportar", "method"=>"POST", "identica" => true],
                
                
            // Empresa -> Tesoreria -> Gastos
            ["url" => "/empresa/tesoreria/gastos", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tesoreria/gastos/listar", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tesoreria/gastos/crear", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/tesoreria/gastos/guardar", "method"=>"POST", "identica" => true], 
            ["url" => "/empresa/tesoreria/gastos/editar/", "method"=>"GET", "identica" => false], 
            ["url" => "/empresa/tesoreria/gastos/actualizar", "method"=>"POST", "identica" => true], 
            ["url" => "/empresa/tesoreria/gastos/exportar", "method"=>"POST", "identica" => true], 


            //Empresa -> Usuarios
            ["url" => "/empresa/usuarios", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/usuarios/crear", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/usuarios/listar", "method"=>"GET", "identica" => true], 
            ["url" => "/empresa/usuarios/guardar", "method"=>"POST", "identica" => true], 
            ["url" => "/empresa/usuarios/cambiarestado/", "method"=>"GET", "identica" => false], 
            ["url" => "/empresa/usuarios/exportar", "method"=>"POST", "identica" => true], 

            //Inventario
            ["url"=>"/inventario", "method"=>"GET", "identica"=>true],
            //Inventario->Categorias
            ["url"=>"/inventario/categorias", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/view/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/categorias/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/crear", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/categorias/editar/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/categorias/actualizar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/categorias/importar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/categorias/exportar", "method"=>"POST", "identica"=>true],

            //Insumos
            ["url"=>"/inventario/insumos", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/view/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/insumos/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/crear", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/insumos/editar/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/insumos/actualizar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/insumos/importar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/insumos/exportar", "method"=>"POST", "identica"=>true],


            //Agenda
            ["url"=>"/agenda", "method"=>"GET", "identica"=>true],
            ["url"=>"/agenda/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/agenda/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/agenda/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/agenda/informe", "method"=>"GET", "identica"=>true],
            ["url"=>"/agenda/generar/informe", "method"=>"POST", "identica"=>true],

            //Consulta
            ["url"=>"/consulta", "method"=>"GET", "identica"=>true],
            ["url"=>"/consulta/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/consulta/consulta", "method"=>"GET", "identica"=>false],
            ["url"=>"/consulta/consultaPaciente", "method"=>"GET", "identica"=>true],
        
            //Graficar
            ["url"=>"/graficar/empleados", "method"=>"GET", "identica"=>true]                    
        ],

        "Enfermera" =>
        [
            ["url" => "/home",    "method"=>"GET", "identica"=>true],
            //Inventario
            ["url"=>"/inventario", "method"=>"GET", "identica"=>true],
            //Inventario->Categorias
            ["url"=>"/inventario/categorias", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/view/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/categorias/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/crear", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/categorias/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/categorias/editar/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/categorias/actualizar", "method"=>"POST", "identica"=>true],

            //Insumos
            ["url"=>"/inventario/insumos", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/view/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/insumos/listar", "method"=>"GET", "identica"=>true],
            ["url"=>"/inventario/insumos/guardar", "method"=>"POST", "identica"=>true],
            ["url"=>"/inventario/insumos/editar/", "method"=>"GET", "identica"=>false],
            ["url"=>"/inventario/insumos/actualizar", "method"=>"POST", "identica"=>true]
        ]
    ];
}
