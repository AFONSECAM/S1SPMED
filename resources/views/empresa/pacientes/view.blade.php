@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/pacientes">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a> 
            
            <a href="/empresa/pacientes/editar/{{$paciente->id}}">
                <button type="button" class="btn btn-success text-white float-right">                    
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-pencil')}}"></use>                    
                    </svg>                    
                    @lang('Editar')
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{$paciente->id}}">
                        <i class="fa fa-bars fa-sm"> @lang('Datos Personales')</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/empresa/pacientes/acompanantes/{{$paciente->id}}">
                        <i class="fas fa-user-friends fa-sm" > @lang('Acompañantes')</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <dt>
                    <b>@lang('Paciente'): </b>
                    {{$paciente->tipoId_id}} {{$paciente->nIdPac}} - 
                    {{$paciente->pNom}} {{$paciente->sNom}} {{$paciente->pApe}} {{$paciente->sApe}} 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt>@lang('Tipo Documento')</dt>
                <dt>@lang('Primer Nombre')</dt>                
                <dt>@lang('Primer Apellido')</dt>
                <dt>@lang('Grupo Sanguíneo')</dt>                                                
                <dt>@lang('Fecha Nacimiento')</dt>
                <dt>EPS</dt>
                <dt>@lang('Ciudad')</dt>
                <dt>@lang('Teléfono')</dt>
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt>{{$paciente->tipoId_id}}</dt>                
                <dt>{{$paciente->pNom}}</dt>
                <dt>{{$paciente->pApe}}</dt>
                <dt>{{$paciente->rh}}</dt>                                
                <dt>{{$paciente->fecNac->format('d-m-Y')}}</dt>
                <dt>{{$paciente->eps->nomEps}}</dt>
                <dt>{{$paciente->ciuRes}}</dt>
                <dt>{{$paciente->telPac}}</dt>
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">
                <dt>@lang('Número Documento')</dt>
                <dt>@lang('Segundo Nombre')</dt>
                <dt>@lang('Segundo Apellido')</dt>
                <dt>@lang('Género')</dt>
                <dt>@lang('Edad')</dt>
                <dt>@lang('Régimen')</dt>                                                
                <dt>@lang('Dirección')</dt>                
                <dt>@lang('Correo')</dt>
                <dt>@lang('Estado Civil')</dt>                                
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt>{{$paciente->nIdPac}}</dt>
                <dt>{{$paciente->sNom}}</dt>
                <dt>{{$paciente->sApe}}</dt>
                <dt>@if($paciente->genero == "I") Indefinido @elseif($paciente->genero == "F") Femenino @else Masculino @endif</dt>
                <dt>{{$paciente->fecNac->age}} años</dt>
                <dt>@if($paciente->regimen == "C") Contributivo @else Subsidiado @endif</dt>                                                
                <dt>{{$paciente->dirRes}}</dt>                
                <dt>{{$paciente->mailPac}}</dt>
                <dt>@if($paciente->eCivil == "C") Casado @elseif($paciente->eCivil == "S") Soltero @elseif($paciente->eCivil == "U") Union Libre @else Viudo @endif</dt>                                
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
@endsection