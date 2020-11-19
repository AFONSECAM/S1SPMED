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
            <a href="/empresa/pacientes/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    @lang('Crear paciente')
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
            <form action="/empresa/pacientes/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <h4>@lang('Pacientes') 
                <a href="/pacientes/crear"><span class="badge badge-success"> <i class="fa fa-plus"></i></a>
            </h4>        
        </div>    
    </div> 
    <div class="row">       
        @foreach ($pacientes as $paciente)
            <div class="col-md-4 col-lg-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body" style="padding-bottom: 5px;">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="/empresa/pacientes/view/{{$paciente->id}}">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        {{$paciente->pNom}} {{$paciente->sNom}} {{$paciente->pApe}} {{$paciente->sApe}}
                                        @if ($paciente->estado == "1")
                                            <i class="fa fa-circle" style="color: green;" aria-hidden="true"></i>
                                        @else
                                            <i class="fa fa-circle" style="color: red;" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                </a>
                                <div class="text-xs font-weight-bold mb-1">
                                    {{$paciente->tipoId_id}} - {{$paciente->nIdPac}} / {{$paciente->fecNac->age}} @lang('años')
                                </div>
                                <div class="text-xs font-weight-bold mb-1">
                                    @if ($paciente->regimen == "C")
                                        Contributivo
                                    @else
                                        Subsidiado
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <center>
                    <div>
                        <a href="/empresa/pacientes/view/{{$paciente->id}}" class="btn btn-xs btn-info" title="Ver Información"><i class="fa fa-eye"></i> </a>
                        <a href="/empresa/pacientes/editar/{{$paciente->id}}" class="btn btn-xs btn-warning" title="Editar"><i class="fa fa-pen"></i> </a>
                        @if ($paciente->estado == "Activo")
                            <a href="/pacientes/cambiarestado/{{$paciente->id}}/0" class="btn btn-xs btn-danger" title="Inactivar"><i class="fa fa-times"></i> </a>
                        @else
                        <a href="/pacientes/cambiarestado/{{$paciente->id}}/1" class="btn btn-xs btn-success"><i class="fa fa-check" title="Activar"></i> </a>
                        @endif                        
                    </div>
                    </center>
                </div>
            </div>                           
        @endforeach           
    </div>
@endsection