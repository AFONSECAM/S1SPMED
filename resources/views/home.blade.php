@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if(Auth::check())                        
                        <span>Bienvenid@ {{ Auth::user()->name }}</span>
                        @if ((Auth::user()->rol->nomRol) == "Enfermera")
                                                 
                            <hr>
                            {{-- INVENTARIO --}}                             
                            <div class="row">
                                {{-- Categorías --}}
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/inventario/categorias"><span class="font-weight-bold">Ver Categorias</span>
                                            <svg class="c-icon">
                                                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')}}"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-info">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-layers')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">
                                                {{ $categorias }}
                                            </div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                @if ($categorias == 1)
                                                Categoría
                                            @else
                                                Categorías
                                            @endif 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $categorias }}%" aria-valuenow="{{ $categorias }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                      
                                </div>

                                {{-- Insumos --}}                         
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/inventario/insumos"><span class="font-weight-bold">Ver Insumos</span>
                                            <svg class="c-icon">
                                                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')}}"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-success">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-barcode')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $insumos }}</div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                @if ($insumos == 1)
                                                Insumo
                                            @else
                                                Insumos
                                            @endif 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $insumos }}%" aria-valuenow="{{ $insumos }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>                                                          
                        @elseif ((Auth::user()->rol->nomRol) == "Administrador")                        
                            <hr>
                            {{-- ADMISTRADOR --}}                             
                            <div class="row">
                                {{-- Empleados --}}
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/empresa/empleados"><span class="font-weight-bold">Ver Empleados</span>
                                            <svg class="c-icon">
                                                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')}}"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-info">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-user')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">
                                                {{ $empleados }}
                                            </div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                @if ($empleados == 1)
                                                    Empleado
                                                @else
                                                    Empleados
                                                @endif 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $empleados }}%" aria-valuenow="{{ $empleados }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    
                                </div>
                                
                                {{-- Pacientes --}}
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/empresa/pacientes">
                                            <span class="font-weight-bold">Ver Pacientes</span>
                                            <svg class="c-icon">
                                                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')}}"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-success">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-people')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $pacientes }}</div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                @if ($pacientes == 1)
                                                    Paciente
                                                @else
                                                    Pacientes
                                                @endif 
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $pacientes }}%" aria-valuenow="{{ $pacientes }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

                                {{-- Usuarios --}}
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/empresa/usuarios">
                                            <span class="font-weight-bold">Ver Usuarios</span>
                                            <svg class="c-icon">
                                                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')}}"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-primary">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-walk')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $usuarios }}</div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                @if ($usuarios == 1)
                                                    Usuario
                                                @else
                                                    Usuarios
                                                @endif                                            
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $usuarios }}%" aria-valuenow="{{ $usuarios }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                                {{-- Sedes --}}
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="card-footer px-3 py-2">
                                        <a class="btn-block text-muted d-flex justify-content-between" href="/empresa/sedes">
                                            <span class="font-weight-bold">Ver Sedes</span>
                                            <svg class="c-icon">
                                                <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-right')}}"></use>
                                            </svg>
                                        </a>
                                    </div>  
                                    <div class="card text-white bg-gradient-warning">
                                        <div class="card-body">
                                            <div class="text-muted text-right mb-4">
                                                <svg class="c-icon c-icon-4xl">
                                                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-hospital')}}"></use>
                                                </svg>
                                            </div>
                                            <div class="text-value-lg">{{ $sedes }}</div>
                                            <h4 class="text-uppercase font-weight-bold">
                                                @if ($sedes == 1)
                                                    Sede
                                                @else
                                                    Sedes
                                                @endif                                            
                                            </h4>
                                            <div class="progress progress-white progress-xs mt-3">
                                                <div class="progress-bar" role="progressbar" style="width: {{ $sedes }}%" aria-valuenow="{{ $sedes }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @else
                        <h1>Bienvenido, ingresó con perfil de Médico</h1>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

