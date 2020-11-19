@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Insumos</li>
                </ol>
            </nav>
        </div> 
        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-lan')}}"></use>                    
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/categorias"> 
                <div class="text-value-lg text-center">
                    <span>@lang('Categorías de Insumos')</span>                                
                </div> 
                </a>                        
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-barcode')}}"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/insumos"> 
                <div class="text-value-lg text-center">
                    <span>@lang('Listado de Insumos')</span>                                
                </div> 
                </a>                        
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-loop-circular')}}"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/entradas"> 
                <div class="text-value-lg text-center">
                    <span>@lang('Entradas')</span>                                
                </div> 
                </a>                        
            </div>
        </div>
        

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/salidas"> 
                <div class="text-value-lg text-center">
                    <span>@lang('Salidas')</span>                                
                </div> 
                </a>                        
            </div>
        </div>
    </div>


    {{-- <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">Médicamentos</li>
                </ol>
            </nav>
        </div> 
        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-lan')}}"></use>                    
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/categorias"> 
                <div class="text-value-lg text-center">
                    <span>Categorías</span>                                
                </div> 
                </a>                        
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-barcode')}}"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/insumos"> 
                <div class="text-value-lg text-center">
                    <span>Medicamentos</span>                                
                </div> 
                </a>                        
            </div>
        </div>

        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-loop-circular')}}"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/entradas"> 
                <div class="text-value-lg text-center">
                    <span>Entradas</span>                                
                </div> 
                </a>                        
            </div>
        </div>
        
        <div class="col-sm-6 col-lg-6">            
            <div class="card">                                                 
                <svg>
                    <use xlink:href="{{asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-contact')}}"></use>
                </svg>
                <a style="text-decoration: none; padding:0; margin:0;" href="/inventario/salidas"> 
                <div class="text-value-lg text-center">
                    <span>Salidas</span>                                
                </div> 
                </a>                        
            </div>
        </div>
    </div> --}}
@endsection