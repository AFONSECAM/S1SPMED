@extends("layouts.app")
@section("contenido")
@include('flash::message')
    <div class="row">
        <div class="col-sm-5 col-md-6 col-lg-6">
            <a href="/empresa">
                <button type="button" class="btn btn-sm btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a>
        </div>

        <div class="col-sm-5 col-md-6 col-lg-6">
            <a href="/empresa/empleados/crear">
                <button type="button" class="btn btn-sm btn-success text-white float-right">
                    @lang('Registrar empleado')
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')}}"></use>                    
                    </svg>                    
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card-body">
            <form action="/empresa/empleados/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <h4>@lang('Empleados') 
                <a href="/empleados/crear"><span class="badge badge-success"> <i class="fa fa-plus"></i></a>
            </h4>        
        </div>    
    </div> 
 
    <div class="row">
       
        @foreach ($empleados as $empleado)
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">                                
                                <div class="text-lg font-weight-bold text-uppercase mb-1">                                    
                                    <b class="card-title">                                        
                                        <h5>@if ($empleado->estado == 1)
                                            <i class="fa fa-circle" style="color: green;" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-circle" style="color: red;" aria-hidden="true"></i>
                                        @endif {{$empleado->cargo->nomCar}}</h5>
                                    </b>
                                    
                                    <span class="badge badge-primary">{{$empleado->cargo->nomCar}}</span>                            
                                </div>  
                                <hr>                              
                                <div class="text-xs font-weight-bold mb-1">
                                    <a href="/empresa/empleados/view/{{$empleado->id}}">{{$empleado->pNom}} {{$empleado->sNom}} {{$empleado->pApe}}</a>
                                </div>
                                <div class="text-xs font-weight-bold mb-1">                                    
                                    {{$empleado->tiposId_id}} / {{$empleado->nIdEmp}} 
                                </div>
                                <div class="text-xs font-weight-bold mb-1">
                                    {{$empleado->mailEmp}}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div>
                        <a href="/empleados/view/{{$empleado->id}}" class="btn btn-xs btn-info" title="Ver Información"><i class="fa fa-eye"></i> </a>
                        <a href="/empleados/edit/{{$empleado->id}}" class="btn btn-xs btn-warning" title="Editar"><i class="fa fa-pen"></i> </a>
                        @if ($empleado->estado == 1)
                            <a href="/empleados/cambiarestado/{{$empleado->id}}/0" class="btn btn-xs btn-danger" title="Inactivar"><i class="fa fa-times"></i> </a>
                        @else
                        <a href="/empleados/cambiarestado/{{$empleado->id}}/1" class="btn btn-xs btn-success"><i class="fa fa-check" title="Activar"></i> </a>
                        @endif                        
                    </div> --}}
                    
                </div>
            </div>                           
        @endforeach           
    </div>
@endsection