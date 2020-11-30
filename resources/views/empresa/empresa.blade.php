@extends('layouts.app')
@section('contenido')
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0 text-center">
                    <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <b>Configuración Empresa <i class="fa fa-angle-down"></i></b>
                    </button>
                </h5>
            </div>
    
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Cargos</a>
                                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Convenios</a>
                                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Procedimientos</a>
                                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Sedes</a>
                                
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="/empresa/cargos">Ver cargos</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/empresa/cargos/crear">Crear cargo</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="/empresa/convenios">Ver convenios</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/empresa/convenios/crear">Crear convenio</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="/empresa/procedimientos">Ver procedimientos</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/empresa/procedimientos/crear">Crear procedimiento</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="/empresa/sedes">Ver sedes</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/empresa/sedes/crear">Crear sede</a>
                                        </li>
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingEmpleados">
                <h5 class="mb-0 text-center">
                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseEmpleados" aria-expanded="false" aria-controls="collapseTwo">
                        <b>Gestión Empleados <i class="fa fa-angle-down"></i></b>
                    </button>
                </h5>
            </div>
            <div id="collapseEmpleados" class="collapse" aria-labelledby="headingEmpleados" data-parent="#accordion">
                <div class="card-body">
                    <div class="tab-pane fade show active  text-center" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/empresa/empleados">Ver empleados</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/empresa/empleados/crear">Crear empleados</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0 text-center">
                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <b>Gestión pacientes <i class="fa fa-angle-down"></i></b>
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="tab-pane fade show active  text-center" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/empresa/pacientes">Ver pacientes</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/empresa/pacientes/crear">Crear paciente</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingUsuarios">
                <h5 class="mb-0 text-center">
                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseTwo">
                        <b>Gestión Usuarios <i class="fa fa-angle-down"></i></b>
                    </button>
                </h5>
            </div>
            <div id="collapseUsuarios" class="collapse" aria-labelledby="headingUsuarios" data-parent="#accordion">
                <div class="card-body">
                    <div class="tab-pane fade show active  text-center" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/empresa/usuarios">Ver usuarios</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/empresa/usuarios/crear">Crear usuario</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingTesoreria">
                <h5 class="mb-0 text-center">
                    <button class="btn" data-toggle="collapse" data-target="#collapseTesoreria" aria-expanded="true" aria-controls="collapseTesoreria">
                        <b>Gestión Tesorería <i class="fa fa-angle-down"></i></b>
                    </button>
                </h5>
            </div>
            <div id="collapseTesoreria" class="collapse" aria-labelledby="headingTesoreria" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-gastos-list" data-toggle="list" href="#list-gastos" role="tab" aria-controls="gastos">Gastos</a>
                                <a class="list-group-item list-group-item-action" id="list-ingresos-list" data-toggle="list" href="#list-ingresos" role="tab" aria-controls="ingresos">Ingresos</a>                                
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-gastos" role="tabpanel" aria-labelledby="list-gastos-list">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="/empresa/tesoreria/gastos">Ver gastos</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/empresa/tesoreria/gastos/crear">Registrar nuevo gasto</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="list-ingresos" role="tabpanel" aria-labelledby="list-ingresos-list">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="/empresa/tesoreria">Ver ingresos</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/empresa//tesoreria/recaudos/crear">Registrar nuevo ingreso</a>
                                        </li>
                                    </ul>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card">        
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">@lang('Configuración Empresa')</li>
                    </ol>
                  </nav>
            </div> 
            <div class="col-sm-6 col-lg-3">            
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-building')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/convenios"> 
                    <div class="text-value-lg text-center">
                        <span>@lang('Convenios')</span>                                
                    </div> 
                    </a>                        
                </div>
            </div>
    
            <div class="col-sm-6 col-lg-3">            
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-eyedropper')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/procedimientos"> 
                    <div class="text-value-lg text-center">
                        <span>@lang('Procedimientos')</span>                                
                    </div> 
                    </a>                        
                </div>
            </div>
    
            <div class="col-sm-6 col-lg-3">            
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-hospital')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/sedes"> 
                    <div class="text-value-lg text-center">
                        <span>@lang('Sedes')</span>                                
                    </div> 
                    </a>                        
                </div>
            </div>
            
    
            <div class="col-sm-6 col-lg-3">            
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/tiposid"> 
                    <div class="text-value-lg text-center">
                        <span>@lang('Tipos ID')</span>                                
                    </div> 
                    </a>                        
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">            
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/cargos"> 
                    <div class="text-value-lg text-center">
                        <span>@lang('Cargos')</span>                                
                    </div> 
                    </a>                        
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">@lang('Gestión Pacientes')</li>
                    </ol>
                </nav>                
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/tesoreria/gastos"> 
                        <div class="text-value-lg text-center">
                            <span>@lang('Tesoreria/Gastos')</span>                                
                        </div> 
                    </a>                        
                </div>
            </div>
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">@lang('Gestión Pacientes')</li>
                    </ol>
                </nav>                
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/tesoreria/recaudos"> 
                        <div class="text-value-lg text-center">
                            <span>@lang('Tesoreria/Recaudos')</span>                                
                        </div> 
                    </a>                        
                </div>
            </div>

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">@lang('Gestión Empleados')</li>
                    </ol>
                </nav>                
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/empleados"> 
                        <div class="text-value-lg text-center">
                            <span>@lang('Empleados')</span>                                
                        </div> 
                    </a>                        
                </div>
            </div>
            
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">@lang('Gestión Pacientes')</li>
                    </ol>
                </nav>                
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/pacientes"> 
                        <div class="text-value-lg text-center">
                            <span>@lang('Pacientes')</span>                                
                        </div> 
                    </a>                        
                </div>
            </div>

            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">@lang('Gestión Usuarios')</li>
                    </ol>
                </nav>                
                <div class="card">                                                 
                    <svg>
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                    </svg>
                    <a style="text-decoration: none; padding:0; margin:0;" href="/empresa/usuarios"> 
                        <div class="text-value-lg text-center">
                            <span>@lang('Usuarios')</span>                                
                        </div> 
                    </a>                        
                </div>
            </div>
        </div>                    
    </div> --}}
    
@endsection