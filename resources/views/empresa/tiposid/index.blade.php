@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a>             
            <a href="/empresa/tiposid/crear">
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
    <div class="card">
        <div class="card-header"> 
            <strong>@lang('Tipos Identificación')</strong>           
        </div>
        <div class="card-body">
            @include('flash::message')
            <table class="table" id="tblTiposid" style="width: 100%;">
                <thead>                    
                    <th>@lang('Tipo')</th>
                    <th>@lang('Nombre')</th>
                    <th>@lang('Acción')</th>                      
                </thead>
                <tbody>

                </tbody>
            </table> 
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $('#tblTiposid').DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: '/empresa/tiposid/listar',
        columns: [        
            {data: 'tipoId', name: 'tipoId'},
            {data: 'nomTipo', name: 'nomTipo'},
            {
                    data: 'editar', 
                    name: 'editar', 
                    orderable: false, 
                    searchable: false
            }
        ]
    });
    $('#flash-overlay-modal').modal();    
</script>
@endsection