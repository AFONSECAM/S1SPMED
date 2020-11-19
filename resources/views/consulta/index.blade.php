@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/home">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a> 
            
            {{-- <a href="/agenda">
                <button type="button" class="btn btn-success text-white float-right">
                    @lang('New')
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')}}"></use>                    
                    </svg>                    
                </button>
            </a> --}}
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <a href="#" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#import" title="Carga masiva de datos">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-paperclip')}}"></use>                    
                </svg>
            </a>             
        </div>
    </div>

    
    <div class="card">
        <div class="card-header"> 
            <form action="/inventario/insumos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>@lang('Citas')</strong>           
        </div>
        <div class="card-body">
            @include('flash::message')
            <table class="table" id="tblCitas">
                <thead>                    
                    <th>@lang('Fecha')</th>
                    <th>@lang('Hora Inicial')</th>
                    <th>@lang('Hora Final')</th>                    
                    <th>@lang('Descripción')</th>                                        
                    <th>@lang('Paciente')</th>
                    <th>@lang('Empleado')</th>
                    <th>@lang('Sede')</th>                                                                        
                    <th>@lang('Acción')</th>                                       
                </thead>
                <tbody>                    
                    {{-- <td><a class="btn btn-sm btn-success" href="consulta/consultaPaciente">Iniciar COnsulta</a></td> --}}
                </tbody>
            </table> 
        </div>
    </div>
    <div class="modal fade" id="import">    
        <form action="/inventario/insumos/importar" method="POST" enctype="multipart/form-data">
            @csrf        
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                        </button>                        
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="file">@lang('Seleccine archivo a cargar')</label>
                            <input type="file" name="file" id="fileInput" class="form-control">                            
                        </div>
                        <div class="progress">
                            <div id="bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <span id="bar-info">0% @lang('Completado')</span>
                            </div>                            
                        </div>
                        <span id="bar-listo"></span>
                        <hr>                      
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="button" disabled>@lang('Importar datos')</button>
                    </div>
                </div>
            </div>    
        </form>
    </div>
@endsection

@section('scripts')
<script>
    $('#tblCitas').DataTable({
    autoWidth: false,
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: '/consulta/listar',
    columns: [        
        {data: 'fecha', name: 'fecha'},
        {data: 'hora_inicio', name: 'hora_inicio'},
        {data: 'hora_final', name: 'hora_final'},
        {data: 'descripcion', name: 'descripcion'},
        {data: 'paciente_id', name: 'paciente_id'},
        {data: 'empleado_id', name: 'empleado_id'},
        {data: 'sede_id', name: 'sede_id'},                
        {
            data: 'accion', 
            name: 'accion', 
            orderable: false, 
            searchable: false
        }
    ]    
});
</script>

@endsection