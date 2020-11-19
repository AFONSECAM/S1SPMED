@extends('layouts.app');
@section('contenido')
    <div class="row">
        <div class="col-12">
            <a href="/empresa/tesoreria/recaudos/crear">
                <button type="button" class="btn btn-success text-white float-right">
                    Registrar ingreso
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
            <form action="/empresa/tesoreria/recaudos/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>Recaudos</strong>
            <a href="/empresa/tesoreria/recaudos/crear"><span class="badge badge-success"><i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_recaudos" class="table" style="width: 100%;">
                <thead>
                    <th>Concepto</th>
                    <th>Fecha</th>
                    <th>Responsable</th>
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
        $('#tbl_recaudos').DataTable({
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: '/empresa/tesoreria/recaudos/listar',
            columns: [
                {
                    data: 'concep',
                    name: 'concep'
                },
                {
                    data: 'fecReca',
                    name: 'fecReca'
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