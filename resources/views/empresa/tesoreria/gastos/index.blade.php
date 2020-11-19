@extends('layouts.app');
@section('contenido')
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
            <a href="/empresa/tesoreria/gastos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    Registrar gasto
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
            <form action="/empresa/tesoreria/gastos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>Gastos</strong>
            <a href="/empresa/tesoreria/gastos/crear"><span class="badge badge-success"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_gastos" class="table" style="width: 100%;">
                <thead>                    
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Medio Pago</th>
                    <th>Empleado</th>
                    <th>Valor</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                </tbody>
            </table>            
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $('#tbl_gastos').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/empresa/tesoreria/gastos/listar',
            columns: [
                {
                    data: 'fecGasto',
                    name: 'fecGasto'
                },
                {
                    data: 'concepto',
                    name: 'concepto'
                },
                {
                    data: 'forPago',
                    name: 'forPago'
                },
                {
                    data: 'empleado_id',
                    name: 'empleado_id'
                },
                {
                    data: 'valor',
                    name: 'valor'
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