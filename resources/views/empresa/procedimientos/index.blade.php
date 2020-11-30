@extends('layouts.app');
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
            <a href="/empresa/procedimientos/crear">
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
            <form action="/empresa/procedimientos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>@lang('Procedimientos')</strong>
            <a href="/empresa/procedimientos/crear"><span class="badge badge-success">@lang('Nuevo') +</span></a>            
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_procedimientos" class="table" style="width: 100%;">
                <thead>
                    <th>@lang('Código')</th>
                    <th>@lang('Nombre')</th>
                    <th>@lang('Pre-condiciones')</th>
                    <th>@lang('Valor')</th>
                    <th>@lang('Estado')</th>
                    <th>@lang('Acción')</th>
                </thead>
                <tbody>

                </tbody>
            </table>            
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $('#tbl_procedimientos').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/empresa/procedimientos/listar',
            columns: [
                {
                    data: 'codProc',
                    name: 'codProc'
                },
                {
                    data: 'nomProc',
                    name: 'nomProc'
                },
                {
                    data: 'preProc',
                    name: 'preProc'
                },
                {
                    data: 'valor',
                    name: 'valor'
                },
                {
                    data: 'estado',
                    name: 'estado'
                },
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