@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="{{ URL::previous() }}">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    Regresar
                </button>
            </a> 
            
            <a href="/empresa/pacientes/acompanantes/crear/{{ explode("?", $pacienteId)[0]}}">
                <button type="button" class="btn btn-success text-white float-right">
                    Nuevo
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')}}"></use>                    
                    </svg>                    
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/empresa/pacientes/view/{{$pacienteId[0]}}">
                        <i class="fa fa-bars fa-sm"> Datos Personales</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">
                        <i class="fas fa-user-friends fa-sm" href="/empresa/pacientes/acompanantes"> Acompañantes</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-header"> 
            <strong>Acompañantes</strong>           
        </div>
        <div class="card-body">
            @include('flash::message')
            <table class="table" id="tblAcompanantes">
                <thead>                    
                    <th>N° Identificación</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Parentesco</th>                    
                    <th>Acción</th>                      
                </thead>
                <tbody>
                </tbody>
            </table> 
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#tblAcompanantes').DataTable({
    processing: true,
    serverSide: true,
    ajax: '/empresa/pacientes/acompanantes/listar/{{ explode("?", $pacienteId)[0]}}',
    columns: [        
        {data: 'nIdAcom', name: 'nIdAcom'},
        {data: 'nombre', name: 'nombre'},
        {data: 'apellidos', name: 'apellidos'},
        {data: 'edad', name: 'edad'},
        {data: 'telAcom', name: 'telAcom'},
        {data: 'mailAcom', name: 'mailAcom'},
        {data: 'parPac', name: 'parPac'},        
        {
            data: 'editar', 
            name: 'editar', 
            orderable: false, 
            searchable: false
        }
    ]
});
</script>

@endsection