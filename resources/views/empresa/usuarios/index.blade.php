@extends('layouts.app')
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
            <a href="/empresa/usuarios/crear">
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
            <form action="/empresa/usuarios/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>Usuarios</strong>
            <a href="/empresa/usuarios/crear"><span class="badge badge-success">Nuevo +</span></a>
        </div>
        <div class="card-body">
            @include('flash::message')
            <table id="tbl_usuarios" class="table" style="width: 100%;">
                <thead>                                      
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Cargo</th>                                          
                    <th>Estado</th>                                                                                   
                </thead>
                <tbody>                    
                </tbody>
            </table>        
        </div>        
    </div>
@endsection

@section("scripts")
    <script>
        $('#tbl_usuarios').DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: '/empresa/usuarios/listar',
        columns: [
            {
                data: 'name', 
                name: 'name'
            },
            {
                data: 'email', 
                name: 'email'
            },            
            {
                data: 'cargo', 
                name: 'cargo'
            },
            {
                data: 'cambiar', 
                name: 'cambiar', 
                orderable: false, 
                searchable: false
            }
        ]
    });
    </script>
@endsection
