@extends('layouts.app')
@section('contenido')
    <div class="row">        
        <div class="col-sm-5 col-md-6 col-lg-5">
            <a href="/empresa">
                <button type="button" class="btn btn-sm btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')}}"></use>                    
                    </svg>
                    @lang('Regresar')
                </button>
            </a>
        </div>
              
        <div class="col-sm-2 col-lg-2 d-none d-md-block">
            {{-- <img src="{{asset('assets/dashboard/assets/img/fondo.PNG')}}" class="img-responsive" alt="" style="width:250px;"> --}}
        </div> 
        <div class="col-sm-5 col-md-6 col-lg-5">
            <a href="/empresa/convenios/crear" class="col-4">
                <button type="button" class="btn btn-sm btn-success text-white float-right">
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
            <form action="/empresa/convenios/exportar" method="POST">
                @csrf
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong>@lang('Convenios')</strong>            
            <a href="/empresa/convenios/crear"><span class="badge badge-success">@lang('Nuevo') +</span></a>           
        </div>

        <div class="card-body">
            @include('flash::message')
            <table id="tbl_convenios" class="table" style="width: 100%;">
                <thead>                                                          
                    <th>@lang('Fecha Apertura')</th>
                    <th>@lang('EPS')</th>
                    <th>@lang('Duración')</th>                                            
                    <th>@lang('Costo')</th>                                            
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
        $('#tbl_convenios').DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: '/empresa/convenios/listar',
        columns: [
            {
                data: 'fecAper', 
                name: 'fecAper'
            },            
            {
                data: 'eps_id', 
                name: 'eps_id'
            },
            {
                data: 'durConv', 
                name: 'durConv'
            },
            {
                data: 'cosConv', 
                name: 'cosConv'
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
            /* {
                data: 'cambiar', 
                name: 'cambiar', 
                orderable: false, 
                searchable: false
            } */
        ]
    });
    </script>
@endsection