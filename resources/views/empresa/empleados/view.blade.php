@extends("layouts.app")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <a href="/empresa/empleados">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a> 
            
            <a href="/empresa/empleados/editar/{{$empleado->id}}">
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
                    <a class="nav-link" href="{{$empleado->id}}">
                        <i class="fa fa-bars fa-sm"> @lang('Datos Personales')</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">
                        <i class="fas fa-calendar-alt fa-sm"> Historial Citas</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <dt>
                    <b>Emmpleado: </b>
                    {{$empleado->tipoId}} {{$empleado->nIdEmp}} - 
                    {{$empleado->pNom}} {{$empleado->sNom}} {{$empleado->pApe}} {{$empleado->sApe}} 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt>@lang('Tipo Documento')</dt>
                <dt>@lang('Número Documento')</dt>
                <dt>@lang('Primer Apellido')</dt>
                <dt>@lang('Segundo Apellido')</dt>
                <dt>@lang('Primer Nombre')</dt>
                <dt>@lang('Segundo Nombre')</dt>
                <dt>@lang('Género')</dt>
                <dt>@lang('Fecha Nacimiento')</dt>
                <dt>@lang('Edad')</dt>
                <dt>@lang('Grupo Sanguíneo')</dt>                
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt>{{$empleado->tiposId_id}}</dt>
                <dt>{{$empleado->nIdEmp}}</dt>
                <dt>{{$empleado->pApe}}</dt>
                <dt>{{$empleado->sApe}}</dt>
                <dt>{{$empleado->pNom}}</dt>                
                <dt>{{$empleado->sNom}}</dt>                
                @if ($empleado->genero == "F")
                    <dt>Femenino</dt>
                @elseif($empleado->genero == "I")
                    <dt>Indefinido</dt>
                @else
                    <dt>Masculino</dt>
                @endif                
                <dt>{{$empleado->fecNac}}</dt>
                <dt>{{$edad}}</dt>
                <dt>{{$empleado->rh}}</dt>
                
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">            
                <dt>EPS</dt>                            
                <dt>ARL</dt>                            
                <dt>@lang('Ciudad')</dt>
                <dt>@lang('Dirección')</dt>
                <dt>@lang('Teléfono')</dt>
                <dt>@lang('Correo')</dt>
                <dt>@lang('Estado Civil')</dt>                
                <dt>@lang('Fecha Ingreso')</dt>
                <dt>@lang('Cargo')</dt>                
                <dt>@lang('Estado')</dt>
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt>{{$empleado->eps}}</dt>
                <dt>{{$empleado->arl}}</dt>
                <dt>{{$empleado->ciuRes}}</dt>
                <dt>{{$empleado->dirRes}}</dt>
                <dt>{{$empleado->telEmp}}</dt>
                <dt>{{$empleado->mailEmp}}</dt>
                <dt>{{$empleado->eCivil}}</dt>                
                <dt>{{$empleado->fecIng}}</dt>
                <dt>{{$empleado->cargo}}</dt>
                <dt>{{$empleado->nomSede}}</dt>
                @if ($empleado->estado == 1)
                    <dt style="color: green;">
                        Activo
                    </dt>
                    @else
                    <dt style="color: red;">
                        Inactivo
                    </dt>
                    @endif
                </dt>
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
@endsection