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
            <a href="/empresa/cargos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    @lang('Nuevo')
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
            <form action="/empresa/cargos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>@lang('Cargos')</strong>
            <a href="/empresa/cargos/crear"><span class="badge badge-success">@lang('Nuevo') +</span></a>                      
        </div>
        <div class="card-body">
            @include('flash::message')
            <table class="table" id="tblCargos" style="width: 100%;">
                <thead>                                        
                    <th>@lang('Cargo')</th>
                    <th>@lang('Salario')</th>
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
    $('#tblCargos').DataTable({
    autoWidth: false,
    processing: true,
    serverSide: true,
    ajax: '/empresa/cargos/listar',
    columns: [                
        {data: 'nomCar', name: 'nomCar'},
        {data: 'salCar', name: 'salCar'},
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